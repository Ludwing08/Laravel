<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends ApiController
{

    public function store(Request $request)
    {
        $data = $request->all();
    
        $validator = Validator::make($data, [
            'name' => ['required', 'min:3', 'max:255'],
            'email' => ['required',  'email' , 'unique:users,email'],
            'password' => ['required'],
            'confirm_password' => ['required', 'same:password']
        ]);
    
        try {
            $validator->validate();

            $data['password'] = bcrypt($request->password);
            $user = User::create($data);
            $token = $user->createToken('myapp')->accessToken;

            $response = ["data"=>$user, "token"=>$token];

            return $this->sendResponse($response, "Successfully registered user");
            // return  response()->json(['message'=>"User created", "data"=>$user, "token"=>$token], 201);

        } catch (ValidationException $e) {
            return $this->sendError("Failed to register user", $e->errors(), 422);
            // return response()->json(['errors' => $e->errors()], 422);
        }
            
    }

    public function testOauth()
    {
        $user = Auth::user();
        return $this->sendResponse($user, "User retrieved successfully");
        // return response()->json(["message" =>"success", "user"=>$user], 200);
    }
   
}
