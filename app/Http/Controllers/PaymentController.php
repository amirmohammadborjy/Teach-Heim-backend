<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentValidation;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //

    public function store(PaymentValidation $paymentValidation){
        /*$validated = $request->validate([
          'orderID' => 'required',
            'amount' => 'required|numeric',
            'method' => '',
            'status' => ''
        ]);
        if(!$validated){
            return response()->json('data is not valid');
        }*/
        Payment::create($paymentValidation);
        return response()->json('data is created');
    }
    public function update(PaymentValidation $paymentValidation, $id){
       /* $validated = $request->validate([
            'orderID' => 'required',
            'amount' => 'required|numeric',
            'method' => '',
            'status' => ''
        ]);
        if(!$validated){
            return response()->json('data is not valid');
        }*/
            $payment=Payment::find($id);
        if(!$payment){
            return response()->json('data not found');
        }
        $payment->update($paymentValidation);
        return response()->json('data updated');
    }
    public function destroy($id){
        $item=Payment::find($id);
        if(!$item){
            return response()->json('data not found');

        }

        $item->delete();
        return response()->json('deleted successfuly');

    }
}
