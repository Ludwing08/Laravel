<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PDFController extends Controller
{

    public function index()
    {
        $data = [
            ['name' => 'Alex', 'edad' => 29],
            ['name' => 'Camila', 'edad' => 15],
            ['name' => 'Ludwing', 'edad' => 23],
            ['name' => 'Milena', 'edad' => 24],
        ];
        $pdf = Pdf::loadView('pdf.index', compact('data'));
        return $pdf->download('invoice.pdf');
    }

    public function save()
    {
        $data = [
            ['name' => 'Alex', 'edad' => 29],
            ['name' => 'Camila', 'edad' => 15],
            ['name' => 'Ludwing', 'edad' => 23],
            ['name' => 'Milena', 'edad' => 24],
        ];
        
        //generar una vista previa
        // $pdf = Pdf::setOption(['dpi' => 150, 'default_paper_orientation' => 'landscape']);
        $pdf=App::make('dompdf.wrapper');
        $pdf = Pdf::loadView('pdf.index', compact('data'));
        return $pdf->stream();
    }

    public function save_load()
    {
        return Pdf::loadFile(public_path().'/myfile.html')->save('/path-to/my_stored_file.pdf')->stream('download.pdf');
    }
}
