<?php

use App\Http\Controllers\Api\V1\ActivityController;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\ConfirmationController;
use App\Http\Controllers\Api\V1\UserDataController;
use Illuminate\Http\Request;
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
Route::post('register', [AuthController::class, 'store'])->name(('store'));

Route::middleware(['auth:api'])->group(function () {
    Route::post('testOauth', [AuthController::class, 'testOauth']);
    Route::resource('users',UserDataController::class );
});

Route::resource('activities',ActivityController::class );
Route::resource('confirmations',ConfirmationController::class );
Route::put('activities/deactivate/{activity}', [ActivityController::class,'deactiveActivity']);
Route::put('users/addOneSignal/{user}', [UserDataController::class, 'addOneSignal']);
Route::get('confirmationsByUser/{user}', [ConfirmationController::class, 'confirmationsByUser']);
Route::get('confirmationsByActivities/{activity}', [ConfirmationController::class, 'confirmationsByActivities']);

// Route::get('getUsers', [UserDataController::class, 'getUsers'] );
// Route::get('getUser/{user}', [UserDataController::class, 'getUser'] );


Route::get('/', function(){
    return 'Hello World';
    
});


