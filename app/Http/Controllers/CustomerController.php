<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\customer;
use App\Models\employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use App\Models\transaction;

class CustomerController extends Controller
{

    // Home Customer
    public function showhome($customerId){
        return view('homecust', ['customerId' => $customerId]);
    }

    //Home About
    public function showabout($customerId){
        return view('about', ['customerId' => $customerId]);
    }

    //Home ProfileCust 
    public function showprofilecust($customerId){
        $user = customer::find($customerId);
        return view('profilecust', ['customerId' => $customerId], compact('user'));
    }

    public function showorderhistory($customerId){
        $customer = customer::findOrFail($customerId);

        $transactions = transaction::whereHas('customer', function($query) use ($customer){
            $query->where('customer_cst_id', $customer->cst_id);
        })->get();
        return view('custorderhistory', ['customerId' => $customerId], compact('transactions'));
    }

    //Home Logout
    public function showlogoutcust($customerId){
        return view('logoutcust', ['customerId' => $customerId]);
    }

    //Home Contact
    public function showcontact($customerId){
        return view('contact', ['customerId' => $customerId]); 
    }

    // Register customer
    public function show(){
        return view('register');
    }


    public function store(RegisterRequest $request)
    {
        try {
            $data = $request->validated();
            $existingCustomer = customer::where('cst_uname', $data['cst_uname'])->first();
            if ($existingCustomer) {
                print('Username already existed\n');
                return redirect()->back()->withInput()->withErrors(['cst_uname' => 'The username already exists. Please choose a different username.']);
            }
            $maxId = customer::max('cst_id');
            $newId = $maxId + 1;
            

            customer::create([
                'cst_id' => DB::raw("($newId + (SELECT COUNT(*) FROM customer WHERE cst_id >= $newId))"),
                'cst_name' => $data['full_name'],
                'cst_age' => $data['age'],
                'cst_address' => $data['address'],
                'cst_phonenumber' => $data['phone_number'],
                'cst_gender' => $data['gender'],
                'cst_uname' => $data['cst_uname'],
                'cst_password' => $data['cst_password'],
            ]);

            return redirect()->route('customer.showlogin');  

            // return redirect()->route('register.success');
        } catch (\Illuminate\Validation\ValidationException $e) {
            dd($e->getMessage());
        }
    }

    // Login Customer

    public function showlogin(){
        return view('logincust');
    }

    public function login(Request $req)
    {
        $credentials = $req->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
    
        $customer = customer::where('cst_uname', $credentials['username'])->first();
        $employee = employee::where('epl_uname', $credentials['username'])->first();
    
        if ($customer && $customer->cst_password === $credentials['password']) {
            Auth::guard('customer')->login($customer);
            return redirect()->route('customer.home', ['customerId' => $customer->cst_id]);
            // return redirect()->intended('/customer/dashboard');
        } elseif ($employee && $employee->epl_password === $credentials['password']) {
            Auth::guard('employee')->login($employee);
            return redirect()->route('admin.dashboard', ['employeeId' => $employee->epl_id]);
            // return redirect()->intended('/employee/dashboard');
        } else {
            return redirect()->back()->withErrors(['login_error' => 'Invalid username or password.']);
        }
        
    }


    // public function updateTimestamps(){
    //     $customers = customer::all();

    //     foreach($customers as $customer){
    //         $customer->update([
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ]);
    //     }
    //     return "Timestamps updated for all customer.";    
    // }
}
