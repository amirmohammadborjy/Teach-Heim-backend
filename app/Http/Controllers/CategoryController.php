<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryValidation;
use App\Http\Requests\UpdateCategoryValidation;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    //
    public function index(){
        $category=Category::all();
        return response()->json([
            "data"=>$category
        ]);
    }

    public function show($id)
    {
        $category=Category::find($id);
        return response()->json(['data'=>$category]);
    }

    public function store(CategoryValidation $categoryValidation)
    {
        try {
            $category=Category::create($categoryValidation->except('imageURL'));
            $imageURL=Storage::putFile('/category', $categoryValidation->imageURL);
            $category->update(['imageURL'=>$imageURL]);
            return response()->json(['data'=> new CategoryResource($category)]);
        }
        catch (\Exception $exception){
            return response()->json([$exception->getMessage(),$exception->getCode(),$exception->getLine()]);
        }

    }

    public function update(UpdateCategoryValidation $updateCategoryValidation, $id){

        $category=Category::find($id);
        if(!$category){
            return response()->json(['category is not found']);
        }
        $category->update($updateCategoryValidation->validated());
        return response()->json(['data is updated']);
    }



    public function destroy($id){
        $category=Category::find($id);
        if(!$category){
            return response()->json(['data not exist'],404);
        }
        $category->delete();
        return response()->json([
            'message'=>'data is deleted',
            'data'=>$category
        ],200);
    }
}
