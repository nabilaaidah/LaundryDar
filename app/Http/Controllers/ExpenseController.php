<?php

namespace App\Http\Controllers;
use App\Models\Expense;
use App\Models\employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ExpenseRequest;
use App\Models\expense_employee;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller as AddExpense;



class ExpenseController extends Controller
{

    public function showaddexpenseform()
    {
        return view('addexpense');
    }

    public function showExpenseList($employeeId){
        $admin = employee::find($employeeId);
        $expenses = DB::table('expense')
        ->join('expense_employee', 'expense.exp_id', '=', 'expense_employee.exp_id')
        ->join('employee', 'expense_employee.epl_id', '=', 'employee.epl_id')
        ->where('employee.epl_id', $employeeId)
        ->get();
        return view('expense', ['employeeId' => $employeeId], compact('admin', 'expenses'));
    }
    
    public function showExpense($employeeId){
        $admin = employee::find($employeeId);
        return view('tambahexp', ['employeeId' => $employeeId], compact('admin'));
    }

    // Tambah expense
    public function store(Request $request, $employeeId)
    {
        try {
            $data = $request->validate([
                'exp_type' => 'required',
                'exp_totalexpense' => 'required',
                'exp_date' => 'required',
            ]);

            //dd($employeeId);
            
            //dd($data);
            $expense = expense::create($data);

            $exp_epl = new expense_employee();
            $exp_epl->exp_id = $expense->exp_id;
            $exp_epl->epl_id = $employeeId;
            $exp_epl->save();
    
            // print("Expense added");
            return redirect()->route('expense.list', ['employeeId' => $employeeId]);    
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    // Tampilkan expense
    public function show($id)
    {
        $expenseController = new ExpenseController();
        $expenseController->show(1);

        $expense = Expense::find($id);
        if ($expense) {
            return view('expense', compact('expense'));
        } else {
            return redirect()->back()->withErrors(['expense_not_found' => 'Expense not found.']);
        }
    }

    public function index()
    {
        $expenses = Expense::all();
        return view('expenses.index', compact('expenses'));
    }


    // Menghapus expense
    public function deleteExpense($id)
    {
        try {
            $expense = expense::find($id);
    
            if ($expense) {
                $expense->delete();
                print("Expense deleted");
            } else {
                print("Expense not found");
            }
    
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    // Created at status
    public function updateTimestamps(){
        $expenses = expense::all();

        foreach($expenses as $expense){
            $expense->update([
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        return "Timestamps updated for all employees.";    
    }
}
