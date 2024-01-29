<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class UserController extends Controller
{
    //
    public function index(){
        $user = User::find(1);   
        if (!empty($user)) {
            return view('index', compact('user'));
        } else {
            return "No data found";            
        }                          
    }

    // public function index_api(): UserResource
    // {
    //     $user = User::find(1);
    //     return new UserResource($user);
    // }

    public function index_api()
    {
        $user = User::find(1);
        return response()->json([
            "phones" => $user->phones,
            "roles" => $user->roles

        ]);
    }
}
