<?php

namespace App\Http\Controllers;

use App\Models\evolucion;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function index()
    {
        $data = evolucion::all();
        
        return view('adminlte.paciente.index', compact('data'));
    }
}
