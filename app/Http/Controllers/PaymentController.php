<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //

    public function store(Request $request){
        $validated = $request->validate([
          'orderID' => 'required',
            'amount' => 'required|numeric',
            'method' => '',
            'status' => ''
        ]);
        if(!$validated){
            return response()->json('data is not valid');
        }
        Payment::create($validated);
        return response()->json('data is created');
    }
    public function update(Request $request, $id){
        $validated = $request->validate([
            'orderID' => 'required',
            'amount' => 'required|numeric',
            'method' => '',
            'status' => ''
        ]);
        if(!$validated){
            return response()->json('data is not valid');
        }
            $payment=Payment::find($id);
        if(!$payment){
            return response()->json('data not found');
        }
        $payment->update($validated);
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
