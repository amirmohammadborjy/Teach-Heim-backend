<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderValidation;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
public function index(){
    $orders=Order::all();
    return response()->json($orders);
}

public function show($id)
{
    $order=Order::find($id);
    return response()->json($order);
}

public function store(OrderValidation $orderValidation){
    /*$validatedData = $request->validate([
        'userID' => 'required',
        'totalPrice' => 'required|numeric',
        'items' => 'required',
    ]);
    if(!$validatedData){
        return response()->json(['error'=>'invalid data']);
    }*/
    Order::created($orderValidation);
    return response()->json(['success'=>'Order created successfully']);
}
public function update(OrderValidation $orderValidation,$id)
{
  /*  $validatedData = $request->validate([
        'userID' => 'required',
        'totalPrice' => 'required|numeric',
        'items' => 'required',

    ]);
    if(!$validatedData){
        return response()->json(['error'=>'invalid data']);
    }*/

    $oreder=Order::find($id);
    if(!$oreder){
        return response()->json(['error'=>'not found'],404);
    }
    $oreder->update($orderValidation);
    return response()->json(['success'=>'Order updated successfully']);
}

public function destroy($id){
    $order=Order::find($id);
        if(!$order){
            return response()->json(['error'=>'data not found']);
        }
        $order->delete();
        return response()->json(['success'=>'Order deleted successfully']);
}
}
