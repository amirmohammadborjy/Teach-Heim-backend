<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserValidation;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Models\users;
use Illuminate\Http\Request;
use Termwind\Components\Dd;

class UsersController extends Controller
{

    public function login(Request $request){

        $user=users::where('email',$request->email)->first();
        if(!$user||$user->password!=$request->password){
            return response()->json("email or password is wrong");
        }
        $token=$user->createToken('user|token');
        return response()->json([
            // 'token'=>$token->plainTextToken,
            'login success welcom'
        ]);
    }
    public function store(Request $request){


     /*   $validatedData= $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phonenumber' => 'required|string|max:255',
            'address' => 'required|string|max:255',

        ]);*/
       /* if(!$validatedData){
            return response()->json(['error'=>'invalid data request']);
        }*/
        try {

            $user=users::create($request);
            //$token=$user->createToken('user | token')->accessToken;
            return response()->json(['success'=>'Data added successfully.',$user]);
        }catch (\Exception $exception){
            return response()->json(['error'=>$exception->getMessage(),'success'=>false,'line'=>$exception->getLine(),'file'=>$exception->getFile()]);
        }

//
    }

    public function index(){
        $users = users::all();
        return response()->json(new UserResource($users));
    }
    public function show($id)
    {
        $user=users::find($id);
        return response()->json(new UserResource($user));
    }
    public function update(UserValidation $userValidation,$id){
       /* $validatedData= $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phonenumber' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        if(!$validatedData){
            return response()->json(['error'=>'invalid data request']);
        }*/
        $user=User::find($id);
        if(!$user){
            return response()->json(['error'=>'user not found']);
        }

        $user->update($userValidation);
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
