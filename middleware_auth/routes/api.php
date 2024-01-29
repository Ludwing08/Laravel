<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/create', [AuthController::class, 'createUser'] );
Route::post('/login', [AuthController::class, 'loginUser'] );

Route::middleware('auth:sanctum')->get('/', function (Request $request) {
    return [
        "name" => $request->user()->name,
        "email" => Auth::user()->email,        
];
});
