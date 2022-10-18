<?php

namespace App\Http\Controllers;

use App\Models\evolucion;
use App\Models\receta;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    public function prnpriview(evolucion $evolucion)
    {
        $name_sucursal = ($evolucion->sucursales()->get())[0]->nombre;
        $pdf = PDF::loadView('PDF.printPDF.printPacientePDF', compact('evolucion', 'name_sucursal'))->setPaper("letter");
//        return view('PDF.printPDF.printPacientePDF', compact("evolucion", "name_sucursal"));;
//        return view('PDF.printPDF.pruebaPDF');
        return $pdf->stream('historia_clinica.pdf');
    }

    public function prnpriview2(receta $receta)
    {

        $receta = receta::find($receta->id);
        $code = "RC-".str_pad($receta->id,3, "0", STR_PAD_LEFT);
        $name_sucursal = ($receta->evolucion->sucursales()->get())[0]->nombre;
        foreach ($receta->evolucion->users as $user) {
            if ($user->id_rol == 1) {
                $user_matricula = $user;
            }
            if ($user->id_rol == 2) {
                $user_medico = $user;
            }
        }
        $pdf = PDF::loadView('PDF.printPDF.printRecetaPDF', compact('receta', 'code', 'name_sucursal', 'user_matricula', 'user_medico'))->setPaper("letter");
        return $pdf->stream($code.'.pdf');
    }
    public function pruebaPrint()
    {
        return view('PDF.printPDF.pruebaPDF');
    }
}
