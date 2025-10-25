<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogValidation;
use App\Models\Blogs;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    //


public function store(BlogValidation $blogValidation){
    /*$validatedData = $request->validate([
        'title' => 'required|max:255|min:3',
        'description' => 'required|max:255|min:3',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

    ]);*/
    Blogs::create($blogValidation);
    return response()->json(['success'=>'You have successfully upload blogs.']);
}
public function show($id)
{
    $blog=Blogs::find($id);
    if(!$blog){
        return response()->json(['error'=>'blog not found']);
    }
    return response()->json($blog);
}
public function index()
{
    $blogs = Blogs::all();
    return response()->json($blogs);
}
public function update(BlogValidation $blogValidation, $id){
    /*$validatedData = $request->validate([
        'title' => 'required|max:255|min:3',
        'description' => 'required|max:255|min:3',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);*/

    $blog=Blogs::find($id);
    if(!$blog){
        return response()->json(['error'=>'blog not found']);
    }
    $blog->update($blogValidation);
    return response()->json(['success'=>'You have successfully upload blogs.']);

}
public function destroy($id){
    $blog=Blogs::find($id);
    if(!$blog){
        return response()->json(['error'=>'blog not found']);
    }
    $blog->delete();
    return response()->json(['success'=>'You have successfully upload blogs.']);
}
}
