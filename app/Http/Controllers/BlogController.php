<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogValidation;
use App\Http\Requests\UpdateBlogValidation;
use App\Http\Resources\BlogResource;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function store(BlogValidation $blogValidation){

        $blog=Blog::create($blogValidation->except('image'));
        $image=Storage::putFile('/blog', $blogValidation->image);
        $blog->update(['image'=>$image]);
        return response()->json(['data'=>new BlogResource($blog),200]);
    }
    public function show($id)
    {
        $blog=Blog::find($id);
        if(!$blog){
            return response()->json(['error'=>'blog not found']);
        }
        return response()->json($blog);
    }
    public function index()
    {
        $blogs = Blog::all();
        return response()->json($blogs);
    }
    public function update(UpdateBlogValidation $updateBlogValidation, $id){

        $blog=Blog::find($id);
        if(!$blog){
            return response()->json(['error'=>'blog not found']);
        }
        $data =$updateBlogValidation->validated();
        $blog->update($data);
        return response()->json(['success'=>'You have successfully upload blogs.']);

    }
    public function destroy($id){
        $blog=Blog::find($id);
        if(!$blog){
            return response()->json(['error'=>'blog not found']);
        }
        $blog->delete();
        return response()->json(['success'=>'You have successfully delete blogs.']);
    }
}
