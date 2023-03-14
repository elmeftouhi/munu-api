<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use HttpResponses;

    public function login(StoreUserRequest $request){
        $request->validated($request);
        $user = User::create([
            'name'          =>  $request->name,
            'email'         =>  $request->email,
            'password'      =>  Hash::make($request->password)
        ]);
        return $this->success([
            'user'      =>  $user,
            'token'     =>  $user->createToken($request->email)->plainTextToken
        ]);

    }

    public function register(Request $r){
        return response()->json('register controller') ;
    }

    public function logout(Request $r){
        return response()->json('logout controller') ;
    }
}
