<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function createUser(CreateUserRequest $request)
    {
        // Validate the request.
        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);

        return response()->json([
            "success" => true,
            "message" => "New user created with succesfully",     
            "token" => $user->createToken("API TOKEN")->plainTextToken    
        ], 200);
    }

    public function loginUser(LoginRequest $request)
    {
        if (!Auth::attempt($request->only(["email", "password"]))) {
            return response()->json([
                "success" => false,
                "message" => "User not find in our registers"                
            ], 401);            
        }

        $user = User::where("email", $request->email)->first();

        return response()->json([
            'success' => true,
            "message" => "Succesfully logged",
            "token" => $user->createToken("API TOKEN")->plainTextToken,
            "name" => Auth::user()->name
        ], 201);

    }
}
