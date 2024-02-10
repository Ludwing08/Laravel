<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavController extends Controller
{
    public function index()
    {
        $items = [
                ['name' => 'Mail Me', "route" => '/mail' ],
                ['name' => 'Mail with Attachments', "route" =>  '/attachment'],
                ['name' => 'Mail Emit - Receive', 'route' => '/emit']
            ];

        return view('layouts._partials.nav', compact('items'));

    }
}
