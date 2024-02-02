<?php

use App\Http\Controllers\LanguageController;
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


Route::get('/lang/{lang}', [LanguageController::class, 'switchLang'] )->name('lang');

Route::get('/example', function(){
    return view('example');
})->name('example');

Route::get('/', function () {
    return view('welcome');
})->name('/');
