<?php

namespace App\Http\Controllers;

use App\Models\evolucion;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    public function prnpriview(evolucion $evolucion)
    {
        $name_sucursal = ($evolucion->sucursales()->get())[0]->nombre;
        return view('PDF.printPDF.printPacientePDF', compact("evolucion", "name_sucursal"));;
//        return view('PDF.printPDF.pruebaPDF');
    }
    public function pruebaPrint()
    {
        return view('PDF.printPDF.pruebaPDF');
    }
}
