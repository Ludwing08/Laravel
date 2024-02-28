<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UserDataController extends ApiController
{
    public function index()
    {
        $usersdata = DB::table('users')
            ->join('user_data', "user_data.user_id", "=", "users.id")
            ->select('*')
            ->get();

        $data['users'] = $usersdata;
        
        return $this->sendResponse($data, 'Users retrieved successfully.');
        // return response()->json(["data" => $data]);
    }

    public function show(User $user)
    {                
        $user_data = UserData::where('user_id', '=', $user->id)->first();
        $data = [
            "user" => $user,
            "user_data" => $user_data
        ];

        return $this->sendResponse($data, 'User retrieved successfully.');
    }

    public function store(Request $request)
    {
        $data = $request->all();
    
        $validator = Validator::make($data, [
            'name' => ['required', 'min:3', 'max:255'],
            'email' => ['required',  'email' , 'unique:users,email'],
            'password' => ['required'],
            'confirm_password' => ['required', 'same:password'],
            'date_born' => ['required', 'date'], 
            'gender' => ['required', 'max:1'],
            'near_to' => ['required']

        ]);
    
        try {
            $validator->validate();

            $data['password'] = bcrypt($request->password);
            $user = User::create($data);
            $token = $user->createToken('myapp')->accessToken;

            $userdata = new UserData();
            $userdata->name= $request->get('name');
            $userdata->photo= $request->get('photo');
            $userdata->date_born= $request->get('date_born');
            $userdata->gender= $request->get('gender');
            $userdata->near_to= $request->get('near_to');
            $userdata->user_id= $user->id;
            $userdata->idOneSingal= $request->get('idOneSingal');
            
            $userdata->save();

            $data = ["user" => $user, "user_data" => $userdata];

            $response = ["data"=>$data, "token"=>$token];

            return $this->sendResponse($response, "Successfully registered user");
            // return  response()->json(['message'=>"User created", "data"=>$user, "token"=>$token], 201);

        } catch (ValidationException $e) {
            return $this->sendError("Failed to register user", $e->errors(), 422);
            // return response()->json(['errors' => $e->errors()], 422);
        }
            
    }

    public function update(Request $request, User $user)
    {
        $data = $request->all();
    
        $validator = Validator::make($data, [
            'name' => ['required', 'min:3', 'max:255'],
            'date_born' => ['required', 'date'], 
            'gender' => ['required', 'max:1'],
            'near_to' => ['required']

        ]);
    
        try {
            if ($user === null) {
                return $this->sendError("User not found");
            }

            $validator->validate();
            
            $user->update($data);            

            $userdata = UserData::where('user_id', '=', $user->id)->first();
            $userdata->name= $request->get('name');
            $userdata->photo= $request->get('photo');
            $userdata->date_born= $request->get('date_born');
            $userdata->gender= $request->get('gender');
            $userdata->near_to= $request->get('near_to');            
            
            $userdata->save();

            $response = ["user" => $user, "user_data" => $userdata];
            

            return $this->sendResponse($response, "Successfully modificated user");
            // return  response()->json(['message'=>"User created", "data"=>$user, "token"=>$token], 201);

        } catch (ValidationException $e) {
            return $this->sendError("Failed to modificated user", $e->errors(), 422);
            // return response()->json(['errors' => $e->errors()], 422);
        }        
    }

    public function destroy(User $user)
    {
        $user->delete();
        $userdata = UserData::where('user_id', '=', $user->id)->first();
        $userdata->delete();

        return $this->sendResponse(["success" => "Ok"], "User Destroy");
    }


    public function addOneSignal(Request $request, UserData $user)
    {
        $data = $request->all();
    
        $validator = Validator::make($data, [
            'idOneSingal' => ['required', 'min:3'],

        ]);
    
        try {
            if ($user === null) {
                return $this->sendError("User not found");
            }

            $validator->validate();
            
            $user->update($data);            

            $response = ["user" => $user];
            

            return $this->sendResponse($response, "Successfully modificated user");
            // return  response()->json(['message'=>"User created", "data"=>$user, "token"=>$token], 201);

        } catch (ValidationException $e) {
            return $this->sendError("Failed to modificated user", $e->errors(), 422);
            // return response()->json(['errors' => $e->errors()], 422);
        }        
    }
}
