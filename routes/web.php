<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TransactionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Login
Route::get('/', [CustomerController::class, 'showlogin'])->name('customer.showlogin');
Route::post('/', [CustomerController::class, 'login'])->name('customer.login');

// ==================== CUSTOMER ====================
// Home customer
Route::get('/customer/home/{customerId}', [CustomerController::class, 'showhome'])->name('customer.home');

//About
Route::get('/customer/home/about/{customerId}', [CustomerController::class, 'showabout'])->name('customer.about');

// Order history
Route::get('/customer/home/orderhistory/{customerId}', [CustomerController::class, 'showorderhistory'])->name('customer.orderhistory');

//Profile Customer
Route::get('/customer/home/profilecust/{customerId}', [CustomerController::class, 'showprofilecust'])->name('customer.profilecust');

//Logout
Route::get('/customer/home/logoutcut/{customerId}', [CustomerController::class, 'showlogoutcust'])->name('customer.logout');

//Contact
Route::get('/customer/home/contact/{customerId}', [CustomerController::class, 'showcontact'])->name('customer.contact');

// Customer
Route::get('/customer/register', [CustomerController::class, 'show']);
Route::post('/customer/register', [CustomerController::class, 'store'])->name('customer.store');

// ==================== CUSTOMER END ====================

// ==================== ADMIN ====================

// Home Dashboard Admin
Route::get('/admin/dashboard/{employeeId}', [EmployeeController::class, 'showDashboard'])->name('admin.dashboard');

//Profile Admin
Route::get('/admin/profile/{employeeId}', [EmployeeController::class, 'showProfile'])->name('admin.profile');

// Employee
Route::get('/employee/dashboard/{employeeId}', [EmployeeController::class, 'showEmployee'])->name('employee.dashboard');

// Expense
Route::get('/admin/expense/{employeeId}', [ExpenseController::class, 'showExpense'])->name('admin.expense');
Route::post('/admin/expense/{employeeId}', [ExpenseController::class, 'store'])->name('expense.store');
Route::get('/admin/expense/list/{employeeId}', [ExpenseController::class, 'showExpenseList'])->name('expense.list');
// Route::get('/admin/expense/add', [ExpenseController::class, 'showaddexpenseform'])->name('expense.showaddexpenseform');
// Route::post('/admin/expense/add', [ExpenseController::class, 'store'])->name('expense.store');

// Service
Route::get('/admin/service/{employeeId}', [ServiceController::class, 'showService'])->name('admin.service');
Route::get('/admin/service/tambah/{employeeId}', [ServiceController::class, 'showaddserviceform'])->name('service.showaddserviceform');
Route::post('/admin/service/tambah/{employeeId}', [ServiceController::class, 'store'])->name('service.store');

// Job Transaction
Route::get('/admin/jobtransaction/{employeeId}', [EmployeeController::class, 'showJobTransaction'])->name('admin.jobtransaksi');

// Job Delivery
Route::get('/admin/jobdelivery/{employeeId}', [EmployeeController::class, 'showJobDelivery'])->name('admin.jobdelivery');

// Employee
Route::get('/admin/employee/{employeeId}', [EmployeeController::class, 'showEmployee'])->name('admin.employee');

// Laporan
Route::get('/admin/laporan/{employeeId}', [EmployeeController::class, 'showLaporan'])->name('admin.laporan');

// Register employee
Route::get('/admin/register/{employeeId}', [EmployeeController::class, 'showregisteradmin'])->name('admin.showregister');
Route::post('/admin/register/{employeeId}', [EmployeeController::class, 'store'])->name('admin.store');

// Transaction
Route::get('/transaction/{customerId}/orderform', [TransactionController::class, 'showorderform'])->name('transaction.showorderform');
Route::post('/transaction/{customerId}/orderform', [TransactionController::class, 'processorderform'])->name('transaction.processorderform');

// Payment
Route::get('/payment/{customerId}/information/total', [PaymentController::class, 'showPaymentTotal'])->name('payment.paymenttotal');
Route::get('/payment/{customerId}/information', [PaymentController::class, 'showpaymentform'])->name('payment.forminfo');
Route::post('/payment/{customerId}/information', [PaymentController::class, 'processPaymentForm'])->name('payment.processpaymentform');

Route::get('/expense/update-timestamps', [TransactionController::class, 'updateTimestamps']);

// ==================== ADMIN END ====================

