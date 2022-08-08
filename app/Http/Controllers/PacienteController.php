<?php

namespace App\Http\Controllers;

use App\Models\evolucion;
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

        return view('adminlte.paciente.historia_clinica', compact('evolucion', 'name_sucursal'));
    }
}
