<?php

namespace App\Http\Controllers;

use App\Models\users;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //

    public function store (Request $request)
    {

        users::create($request->all());
        //id=1
        //name=ali
        //pass=alsj;lkq';dkqwp'dkqw['p
        return response()->json('user added successfully',200);

    }

    public function index(){
        $users=users::all();
        return response()->json($users);
    }

    public function show($id){

        $user=users::find($id);



        return response()->json($user);
    }

    public function update(Request $request,$id)
    {
        $user=users::find($id);
        $user->update($request->all());
       return response()->json($user,200);
    }

    public function destroy($id)
    {
        $user=users::find($id);
        $user->delete();
        return response()->json('user deleted successfully',200);
    }

}
