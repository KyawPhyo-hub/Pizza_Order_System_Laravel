<?php

namespace App\Http\Controllers\Admin;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function paymentHome(){
        $payments = Payment::all();
        return view('admin.Payment.paymentHome',compact('payments'));
    }

    //store payment
    public function storePayment(Request $request){
        // Validate the request data
        $request->validate([
            'paymentMethod' => 'required|string',
            'account' => 'nullable|string|unique:payments,account|max:255',
            'name' => 'nullable|string|max:255',
        ]);
        $payment = [
            'payment_method' => $request->paymentMethod,
            'account' => $request->account,
            'name' => $request->name,
        ];

        Payment::create($payment);

        return redirect()->route('adminPaymentHome')->with('success', 'Payment stored successfully!');
    }
}
