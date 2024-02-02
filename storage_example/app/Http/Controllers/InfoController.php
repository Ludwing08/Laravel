<?php

namespace App\Http\Controllers;

use App\Http\Requests\InfoRequest;
use App\Models\Info;
use Illuminate\Http\Request;
use PgSql\Lob;

class InfoController extends Controller
{
    //
    public function index()
    {
        $infos = Info::get();

        return view('index', compact('infos'));
    }

    public function create()
    {
        return view('form');
    }

    public function store(InfoRequest $request)
    {
        $file_name = time().'.'.$request->file('path-file')->extension();
        // $request->file("path-file")->move(public_path("images"),$file_name);  
        $request->file("path-file")->storeAs('public/images',$file_name);


        Info::create([
            "name_file" => $request->input('name-file'),
            "path_file" => 'images/'.$file_name
        ]);

        return redirect()->route('index');
    }
}
