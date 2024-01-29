<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function index()
    {
        /*$users = User::where('age', '>', 30)->where()->get();
        $users = User::find(2);
        $users = User::all();        
        */

        /*
        $age =30;
        $users = DB::select(DB::raw("select * from users where age='$age'"));
        */
        
        return view('user.index', compact('users'));
    }


    public function create(){
        User::create([
            "name" => "Ruiz",
            "email" => "admin@mail.com",
            'password' => bcrypt("12345678"),
            "age" => 42,
            "address" => "AV. Pruebas 17",
            "zip_code" => 280808

        ]);

        User::create([
            "name" => "Meladi",
            "email" => "meldi@mail.com",
            'password' => bcrypt("12345678"),
            "age" => 30,
            "address" => "AV. Laravel 18",
            "zip_code" => 280808

        ]);

        User::create([
            "name" => "Camila",
            "email" => "camila@mail.com",
            'password' => bcrypt("12345678"),
            "age" => 25,
            "address" => "AV. Laravel 10",
            "zip_code" => 280099
        ]);

        return redirect(route('user.index'));
    }
}
