<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewValidation;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    //

public function store(ReviewValidation $reviewValidation)
{
   /* $validatedData = $request->validate([

        'userID' => 'required',
        'productID' => 'required',
        'rating' => 'required|numeric|min:1|max:5',
        'messages' => 'required|min:3',
    ]);
    if(!$validatedData){
        return response()->json('data is not valid');
    }*/
    Review::creat($reviewValidation);
    return response()->json('data is created');

}
public function show($id){
    $review=Review::find($id);
    if(!$review){
        return response()->json('data not found');
    }
    return response()->json($review);
}
    public function index(){
        $reviews=Order::all();
        return response()->json($reviews);
    }

public function update(ReviewValidation $reviewValidation, $id)
{
   /* $validatedData = $request->validate([
        'userID' => 'required',
        'productID' => 'required',
        'rating' => 'required|numeric|min:1|max:5',
        'messages' => 'required|min:3',
    ]);
    if(!$validatedData){
        return response()->json('data is not valid');
    }*/
    $review=Review::find($id);
    if(!$review){
        return response()->json('data not found');
    }
    $review->update($reviewValidation);
    return response()->json('data updated');
}
public function destroy($id){
    $review=Review::find($id);
    if(!$review){
        return response()->json('review not found',404);
    }
    $review->delete();
}
}
