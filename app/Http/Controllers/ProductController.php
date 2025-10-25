<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductValidation;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //






    public function store(ProductValidation $productValidation)
{
  /*  $validatedData = $request->validate([
        'name' => 'required|max:255',
        'price' => 'required|max:255',
        'description' => 'required|max:255',
        'image' => 'max:255|mimes:jpeg,jpg,png',
        'category_id' => 'max:255',
        'brand_id' => 'max:255',
        'color' => 'required|max:255',
        'discount' => 'required|max:255',
        'rate' => 'required|max:255'
    ]);*/

    Product::creat([$productValidation]);
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

    public function update(ProductValidation $productValidation,$id){
        $product=Product::find($id);
        if(!$product){
            return response()->json(['error'=>'Product not found.']);
        }
       /* $validatedData = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|max:255',
            'description' => 'required|max:255',
        ]);*/
        $product->update($productValidation);
        return response()->json(['success'=>'Product updated successfully.']);
}

public function destroy($id){
        Product::find($id)->delete();
        return response()->json(['success'=>'Product deleted successfully.']);
}
}
