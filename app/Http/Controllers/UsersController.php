<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function store(Request $request){


        $validatedData= $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phonenumber' => 'required|string|max:255',
            'address' => 'required|string|max:255',

        ]);
        if(!$validatedData){
            return response()->json(['error'=>'invalid data request']);
        }

        users::create($validatedData);
        return response()->json(['success'=>'Data added successfully.']);

    }
    public function showall(){
        $users = users::all();
        return response()->json($users);
    }
    public function show($id)
    {
        $user=users::find($id);
        return response()->json($user);
    }
    public function update(Request $request,$id){
        $validatedData= $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phonenumber' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        if(!$validatedData){
            return response()->json(['error'=>'invalid data request']);
        }
        $user=User::find($id);
        if(!$user){
            return response()->json(['error'=>'user not found']);
        }

        $user->update($validatedData);
        return response()->json(['success'=>'Data updated successfully.']);
    }


    public function destroy($id){
        $user=users::find($id);
        if(!$user){
            return response()->json(['error'=>'user not found']);
        }
        $user->delete();
        return response()->json(['success'=>'Data deleted successfully.']);
    }
}
