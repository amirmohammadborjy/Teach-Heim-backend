<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandValidation;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    //


public function store(BrandValidation $brandValidation){
   /* $validaData = $request->validate([
        'name' => 'required|max:255|min:3',
        'logoURL'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    if(!$validaData){
        return response()->json(['error'=>'invalid request data']);
    }*/
    Category::create($brandValidation);
    return response()->json(['success'=>'Data added successfully.']);
}
public function show($id)
{
    $brand=Brand::find($id);
    if(!$brand){
        return response()->json(['error'=>'brand not found']);
    }
    return response()->json($brand);

}
public function index()
{
    $brand=Brand::all();
    return response()->json($brand);
}



public function update(BrandValidation $brandValidation,$id){
    /*$validaData = $request->validate([
        'name' => 'required|max:255|min:3',
        'logoURl'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    if(!$validaData){
        return response()->json(['error'=>'invalid request data']);
    }*/
    $brand=Brand::find($id);
    if(!$brand){
        return response()->json(['error'=>'brand not found']);
    }
    $brand->update($brandValidation);
    return response()->json(['success'=>'Data updated successfully.']);
}
public function destroy($id){
    $brand=Brand::find($id);
    if(!$brand){
        return response()->json(['error'=>'brand not found']);
    }
    $brand->delete();
    return response()->json(['success'=>'Data deleted successfully.']);
}
}
