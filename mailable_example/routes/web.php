<?php

use App\Http\Controllers\MailController;
use App\Http\Controllers\NavController;
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
Route::get('/', [NavController::class, 'index'])->name('index');
Route::get('/mail', [MailController::class, 'mailMe'])->name('mailMe');


