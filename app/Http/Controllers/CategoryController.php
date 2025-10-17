<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index(){
        $category=Category::all();
        return response()->json($category);
    }

    public function show($id)
    {
        $category=Category::find($id);
        return response()->json($category);
    }

    public function store(Request $request)
    {
        $validaData = $request->validate([
            'name' => 'required|max:255|min:3',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if(!$validaData){
            return response()->json(['data is not valid']);
        }
        Category::create($validaData);
        return response()->json(['data is created']);
    }
    public function update(Request $request, $id){
        $validaData = $request->validate([
            'name' => 'required|max:255|min:3',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if(!$validaData){
            return response()->json(['data is not valid']);
        }
        $category=Category::find($id);
        $category->update($validaData);
        return response()->json(['data is updated']);
    }
    public function destroy($id){
        $category=Category::find($id);
        if(!$category){
            return response()->json(['data not exist']);
        }
        $category->delete();
        return response()->json(['data is deleted']);
    }
}
