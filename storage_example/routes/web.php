<?php

use App\Http\Controllers\InfoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [InfoController::class, 'index'] )->name('index');
Route::get('/create', [InfoController::class, 'create'] )->name('create');
Route::post('/store', [InfoController::class, 'store'])->name('store');
Route::delete('/destroy/{id}',[InfoController::class,'destroy'])->name('destroy');
