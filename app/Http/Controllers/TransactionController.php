<?php

namespace App\Http\Controllers;

use App\Models\payment;
use App\Models\service;
use App\Models\customer;
use App\Models\delivery;
use App\Models\employee;
use App\Models\transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\expense_employee;
use App\Models\transaction_detail;
use Illuminate\Support\Facades\DB;
use App\Models\employee_transaction;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    public function showorderform($customerId)
    {
        $services = Service::pluck('svc_name', 'svc_id');
        return view('transactionform', ['customerId' => $customerId, 'services' => $services]);
    }    


    public function processorderform(Request $req, $customerId){
        $customerExists = customer::where('cst_id', $customerId)->exists();
        if($customerExists){
            $tsc = new transaction();

            // transaction::where('customer_cst_id', 1)->delete();
        
            $maxId = transaction::max('tsc_id');
            $newtscId = $maxId + 1;

            $tglSelesai = Carbon::now()->addDays(3);
            $maxeplId = employee::max('epl_id');
            // dd($newtscId);

            transaction::create([
                'tsc_id' => DB::raw("($newtscId + (SELECT COUNT(*) FROM transaction WHERE tsc_id >= $newtscId))"),
                'tsc_status' => 'New',
                'tsc_tglmasuk' => now(),
                'tsc_tglselesai' => $tglSelesai,
                'tsc_tglambil' => null,
                'tsc_totalprice' => 0,
                'customer_cst_id' => $customerId,
            ]);
            
            employee_transaction::create([
                'epl_id' => rand(1, $maxeplId),
                'tsc_id' => $newtscId
            ]);

            $validator = Validator::make($req->all(),[
                'addmore.*.service' => 'required',
                'addmore.*.qty' => 'required|numeric',
            ]);

            if ($validator->fails()) {
                // Add this debug statement
                dd($validator->errors()->all());
            }
            $totalPrice = 0;
            $tsc_detail = $req->input('addmore');
            foreach($tsc_detail as $detail){
                $maxId = transaction_detail::max('tsc_td_id');
                $newId = $maxId + 1;
                
                $selectedService = $detail['service'];
                $service = service::where('svc_name', $selectedService)->first();
                if ($service) {
                    $service_svc_id = $service->svc_id;
                    $svc_priceperkilo = $service->svc_priceperkilo;
                }
                

                $totaltd = $svc_priceperkilo * $detail['qty'];
                transaction_detail::create([
                    'tsc_td_id' => DB::raw("($newId + (SELECT COUNT(*) FROM transaction_detail WHERE tsc_td_id >= $newId))"),
                    'tsc_td_quantity' => $detail['qty'],
                    'tsc_td_pricequantity' => 0,
                    'service_svc_id' => $service_svc_id,
                    'transaction_tsc_id' => $newtscId,
                ]);
                $totalPrice += $totaltd;
                // dd($tsc_detail);
            }

            
            $customer = customer::find($customerId);

            $deliveryNeeded = $req->input('delivery') === 'yes';

            $address = $req->input('address') ?? $customer->cst_address;
            
            $deliveryprice = 0;
            if ($deliveryNeeded) {
                $randomNumber = mt_rand(10000, 30000);
                $deliveryprice = round($randomNumber, -3);

                $maxId = delivery::max('div_id');
                $newId = $maxId + 1;

                $timestamp = strtotime('+3 days');
                $dateAhead = date('Y-m-d', $timestamp);

                $delivery = new delivery();
                $delivery->div_id = $newId;
                $delivery->transaction_tsc_id = $newtscId;
                $delivery->div_address = $address;
                $delivery->div_date = $dateAhead;
                $delivery->div_price = 0;
                $delivery->employee_epl_id = rand(1, $maxeplId);
                $delivery->save();
            }
            $totalPrice += $deliveryprice;
            $tsc = transaction::find($newtscId);
            $tsc->update([
                'tsc_totalprice' => $totalPrice,]);
            // dd($delivery);
            return redirect()->route('payment.paymenttotal', ['customerId' => $customerId]);
        }
        else{
            abort(404, 'Customer not found');
        }
    }

    // public function updateTimestamps(){
    //     $customers = transaction::all();

    //     foreach($customers as $customer){
    //         $customer->update([
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ]);
    //     }

    //     $customers = transaction_detail::all();

    //     foreach($customers as $customer){
    //         $customer->update([
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ]);
    //     }

    //     $customers = payment::all();

    //     foreach($customers as $customer){
    //         $customer->update([
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ]);
    //     }

    //     $customers = delivery::all();

    //     foreach($customers as $customer){
    //         $customer->update([
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ]);
    //     }

    //     $customers = expense_employee::all();

    //     foreach($customers as $customer){
    //         $customer->update([
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ]);
    //     }

    //     $customers = employee_transaction::all();

    //     foreach($customers as $customer){
    //         $customer->update([
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ]);
    //     }

    //     return "Timestamps updated for all customer.";    

    // }
}
