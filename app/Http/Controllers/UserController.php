<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserValidation;
use App\Http\Requests\UserValidation;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $users = User::all();
         return response()->json($users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserValidation $userValidation)
    {
        try {
            if(User::where('email',$userValidation->email)->exists()){
                return response()->json(['message' => 'این ایمیل قبلاً ثبت شده است.'], 422);
            }
            $userValidation['password']=Hash::make($userValidation['password']);
            $user=User::create($userValidation->except('avatarURl'));
            $avatarURl=Storage::putFile('/user',$userValidation['avatarURl']);
            $user->update(['avatarURl'=>$avatarURl]);
            $token=$user->createToken('User | Api');
            return response()->json(['data'=>new UserResource($user),'token'=>$token->plainTextToken],201);
        }catch (\Exception $exception){
            return response()->json(['message'=>$exception->getMessage()],500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user=User::find($id);
        return response()->json([new UserResource($user)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function login(Request $request)
    {
        $user=User::where('email',$request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['error'=>'email or password is wrong'],401);
        }
        $token = $user->createToken('user_token');
        return response()->json([
            'token'=>$token->plainTextToken,
            'message'=>'login success welcom'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserValidation $request,$id)
    {
        $user=User::find($id);
        if(!$user){
            return response()->json(['error'=>'user not found']);
        }

        $user->update($request->validated());
        return response()->json(['success'=>'Data updated successfully.']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user=User::find($id);
        if(!$user){
            return response()->json(['error'=>'user not found']);
        }
        $user->delete();
        return response()->json(['success'=>'Data deleted successfully.']);
    }

    public function logout(Request $request)
    {
        $user = $request->user();

        if (!$user || !$user->currentAccessToken()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $user->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out successfully']);
    }


}
