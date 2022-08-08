<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    public function index()
    {
        return view('adminlte.medico.index');
    }

    public function buscar_paciente(Request $request)
    {
        $user_matricula = User::where("matricula", $request->matricula)->first();
        $user_evoluciones =$user_matricula->evoluciones;

        return view('adminlte.medico.historia_clinica_medico', compact('user_evoluciones'));
    }
}
