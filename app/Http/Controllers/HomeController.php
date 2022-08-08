<?php

namespace App\Http\Controllers;

use App\Models\evolucion;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_evoluciones = (auth()->user())->evoluciones;
         /*       $user_sucursales = ($user_evoluciones[0])->sucursales;

                $user_especialidades = ($user_evoluciones[0])->especialidades;

                $user_sucursales = ($user_evoluciones[0])->users;

        dd($user_sucursales);
                $resultado = $condicion ? 'verdadero' : 'falso';
                dd($resultado);
                id_rol medico
        dd($user_evoluciones[0]->users[1]->id_rol);*/

        return view('adminlte.paciente.index', compact('user_evoluciones',));
    }
}
