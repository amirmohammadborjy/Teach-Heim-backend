<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductValidation;
use App\Http\Requests\UpdateProductValidation;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function store(ProductValidation $productValidation){
        try {
            if (isset($productValidation['discount'])) {
                $productValidation['discount'] = (float) $productValidation['discount'];
            }
            $product=Product::create($productValidation->except('imageURL'));
            $imageURL=Storage::putFile('/product', $productValidation->imageURL);
            $product->update(['imageURL'=>$imageURL]);
            return response()->json(['data'=>new ProductResource($product)],201);
        }catch (\Exception $exception){
            return response()->json([$exception->getMessage(),$exception->getCode(),$exception->getLine()]);
        }

    }

    public function offer ()
    {
        $products = Product::where('discount', '<', 20)->get();
        return response()->json(['data'=>$products]);
    }

    public function category($type)
    {
        $products = Product::where('category', $type)->get();
        return response()->json(['data'=>$products]);
    }

    public function index()
    {
        $product=Product::all();
        return response()->json([
            'data'=>$product,
        ]);
    }
    public function show($id)
    {
        $product=Product::find($id);
        return response()->json([
            'data'=>$product,
        ]);
    }

    public function update(UpdateProductValidation $request,$id){
        $product=Product::find($id);
        if(!$product){
            return response()->json(['error'=>'Product not found.'],404);
        }
        $product->update($request->validated());
        return response()->json(['success'=>'Product updated successfully.']);
    }

    public function destroy($id){
        Product::find($id)->delete();
        return response()->json(['success'=>'Product deleted successfully.']);
    }





    public function lastestProducts()
    {
        $products = Product::orderBy('created_at', 'desc')
            ->take(4)
            ->get();

        return response()->json([
            'products' => $products
        ]);
    }



}
