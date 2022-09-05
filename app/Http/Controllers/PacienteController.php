<?php

namespace App\Http\Controllers;

use App\Models\evolucion;
use App\Models\User;
use Illuminate\Http\Request;

class PacienteController extends Controller
{

    public function index()
    {
        $user_evoluciones = (auth()->user())->evoluciones;
        $data = evolucion::all();

        return view('adminlte.paciente.index', compact('user_evoluciones'));
    }

    public function historia(evolucion $evolucion)
//    {
//        $data = $evolucion->historias;
//        return view('adminlte.paciente.historia', compact('data'));
//    }
    {
        $name_sucursal = ($evolucion->sucursales()->get())[0]->nombre;
        $code = "HC N°".str_pad($evolucion->id,3, "0", STR_PAD_LEFT);

        return view('adminlte.paciente.historia_clinica', compact('evolucion', 'name_sucursal', 'code'));
    }
}
