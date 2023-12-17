<?php

namespace App\Http\Controllers;

use App\Models\payment;
use App\Models\transaction;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function showPaymentForm($customerId){
        return view('paymentform', ['customerId' => $customerId]);
    }

    public function showPaymentTotal($customerId){
        return view('paymenttotal', ['customerId' => $customerId]);
    }

    public function processPaymentForm(Request $req, $customerId)
    {
        $transaction = transaction::where('customer_cst_id', $customerId)->latest()->first();

        // $disc = 0;
        // if ($transaction->tsc_totalprice >= 150000) {
        //     $disc = $transaction->tsc_totalprice * 0.1;
        // }
        // $amount = $transaction->tsc_totalprice - $disc;

        $maxId = payment::max('pm_id');
        $newId = $maxId + 1;

        $pmmethod = $req->input('pm_method');
        $paymentData = [
            'pm_id' => $newId,
            'pm_method' => $pmmethod,
            'pm_date' => now(),
            'pm_amount' => $transaction->tsc_totalprice,
            'pm_discount' => 0,
            'transaction_tsc_id' => $transaction->tsc_id,
        ];
        payment::create($paymentData);
        return redirect()->route('customer.orderhistory', ['customerId' => $customerId]);
    }

}
