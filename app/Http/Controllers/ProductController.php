<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //






    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|max:255',
        'price' => 'required|max:255',
        'description' => 'required|max:255',
        'image' => 'max:255|mimes:jpeg,jpg,png',
        'category_id' => 'max:255',
        'brand_id' => 'max:255',
        'color' => 'required|max:255',
        'discount' => 'required|max:255',
        'rate' => 'required|max:255'
    ]);

    Product::creat([$validatedData]);
    return response()->json(['success'=>'Product added successfully.']);
}

public function showall($id)
{
    $product=Product::all();
    return response()->json($product);
}
public function show($id)
{
  $product=Product::find($id);
  return response()->json($product);
}

    public function update(Request $request,$id){
        $product=Product::find($id);

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|max:255',
            'description' => 'required|max:255',
        ]);
        $product->update($validatedData);
        return response()->json(['success'=>'Product updated successfully.']);
}

public function destroy($id){
        Product::find($id)->delete();
        return response()->json(['success'=>'Product deleted successfully.']);
}
}
