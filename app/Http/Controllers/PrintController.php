<?php

namespace App\Http\Controllers;

use App\Models\evolucion;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    public function prnpriview(evolucion $evolucion)
    {
        $name_sucursal = ($evolucion->sucursales()->get())[0]->nombre;
        $pdf = PDF::loadView('PDF.printPDF.printPacientePDF', compact('evolucion', 'name_sucursal'));
//        return view('PDF.printPDF.printPacientePDF', compact("evolucion", "name_sucursal"));;
//        return view('PDF.printPDF.pruebaPDF');
        return $pdf->stream('historia_clinica.pdf');
    }
    public function pruebaPrint()
    {
        return view('PDF.printPDF.pruebaPDF');
    }
}
