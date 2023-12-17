<?php

namespace App\Http\Controllers;

use Validator;
use Carbon\Carbon;
use App\Models\Employee;
use App\Models\transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;




class EmployeeController extends Controller
{
        // Dashboard Admin
        public function showDashboard($employeeId){
            $admin = employee::find($employeeId);
            $transactions = DB::table('transaction')
            ->join('employee_transaction', 'transaction.tsc_id', '=', 'employee_transaction.tsc_id')
            ->join('employee', 'employee_transaction.epl_id', '=', 'employee.epl_id')
            ->where('employee.epl_id', $employeeId)
            ->get();
            $deliveries = DB::table('delivery')
                ->where('employee_epl_id', $employeeId)
                ->get();
            return view('dashboardmin', ['employeeId' => $employeeId], compact('admin', 'transactions', 'deliveries'));
            }

            //Dashboard My Profile
            public function showProfile($employeeId){
            $user = employee::find($employeeId);
            return view('profilemin', ['employeeId' => $employeeId], compact('user'));
        }

        // // Dashboard Job Transaction
        // public function showJobTransaction($employeeId){
        // return view('transactionmin', ['employeeId' => $employeeId]);
        // }

        // // Dashboard Job Delivery
        // public function showJobDelivery($employeeId){
        //     $admin = employee::find($employeeId);
        // return view('deliverymin', ['employeeId' => $employeeId], compact('admin'));
        // }

        // Dashboard employee
        public function showEmployee($employeeId){
        $epl = employee::find($employeeId);
        $admin = DB::table('employee')->get();
        return view('employee', ['employeeId' => $employeeId], compact('epl', 'admin'));
        }

        // Dashboard laporan
        public function showLaporan($employeeId){
        $admin = employee::find($employeeId);
        return view('laporan', ['employeeId' => $employeeId], compact('admin'));
        }
        
        public function showregisteradmin($employeeId){
        $admin = employee::find($employeeId);
        return view('tambahemp', ['employeeId' => $employeeId], compact('admin'));
        }
        
        
    // Register employee
    public function show(){
        return view('registerEmployee');
    }

    public function store(Request $request, $employeeId)
    {
        try {
            $data = $request->validate([
                'epl_name' => 'required',
                'epl_jobtitle' => 'required',
                'epl_phonenumber' => 'required',
                'epl_gender' => 'required',
                'epl_salary' => 'required',
                'epl_age' => 'required',
                'epl_uname' => 'required|unique:employee,epl_uname',
                'epl_password' => 'required',
            ]);
            // dd($data);
            $existingEmployee = employee::where('epl_uname', $data['epl_uname'])->first();
            if ($existingEmployee) {
                print('Username already existed\n');
                return redirect()->back()->withInput()->withErrors(['epl_uname' => 'The username already exists. Please choose a different username.']);
            }
            $maxId = employee::max('epl_id');
            $newId = $maxId + 1;
            

            employee::create([
                'epl_id' => DB::raw("($newId + (SELECT COUNT(*) FROM employee WHERE epl_id >= $newId))"),
                'epl_name' => $data['epl_name'],
                'epl_jobtitle' => $data['epl_jobtitle'],
                'epl_phonenumber' => $data['epl_phonenumber'],
                'epl_gender' => $data['epl_gender'],
                'epl_salary' => $data['epl_salary'],
                'epl_age' => $data['epl_age'],
                'epl_workstatus' => 'Tidak bekerja',

                'epl_uname' => $data['epl_uname'],
                'epl_password' => $data['epl_password'],
            ]);

            //print("employee added");

            return redirect()->route('admin.employee', ['employeeId' => $employeeId]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    // Login employee

    public function showlogin(){
        return view('loginemployee');
    }

    public function login(Request $req)
    {
        $credentials = $req->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
    
        $employee = employee::where('epl_uname', $credentials['username'])->first();
        $employee = employee::where('epl_uname', $credentials['username'])->first();
    
        if ($employee && $employee->epl_password === $credentials['password']) {
            Auth::guard('employee')->login($employee);
            print("Authenticated as employee");
            // return redirect()->intended('/employee/dashboard');
        } elseif ($employee && $employee->epl_password === $credentials['password']) {
            Auth::guard('employee')->login($employee);
            print("Authenticated as Employee");
            // return redirect()->intended('/employee/dashboard');
        } else {
            return redirect()->back()->withErrors(['login_error' => 'Invalid username or password.']);
        }
        
    }

    public function updateTimestamps(){
        $employees = employee::all();

        foreach($employees as $employee){
            $employee->update([
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        return "Timestamps updated for all employees.";    
    }

}
