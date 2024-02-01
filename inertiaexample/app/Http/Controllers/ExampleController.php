<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ExampleController extends Controller
{
    //
    public $cadena= "controller";

    public function  getIndex()
    {
        return Inertia::render('ExampleController');
    }
}
