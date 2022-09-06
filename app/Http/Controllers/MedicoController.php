<?php

namespace App\Http\Controllers;

use App\Models\especialidad;
use App\Models\evolucion;
use App\Models\sucursal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        return view('adminlte.medico.historia_clinica_medico', compact('user_evoluciones', 'user_matricula'));
    }
    public function add_historia_clinica()
    {
        $sucursales = sucursal::all();
        $especialidades = especialidad::all();
        return view('adminlte.medico.add_historia_clinica', compact('sucursales', 'especialidades'));
    }
    public function add_registro(Request $request)
    {

        //TODO:validaciones hay que hacer
        $paciente = (User::where("matricula", $request->codAsegurado)->first())->id;
        $medico = auth()->user()->id;
        $array_users = array($paciente, $medico);

        $evolucion = evolucion::create([
            'diagnostico' =>$request->textDiagnostico,
            'conducta' =>$request->textConducta,
        ]);
        $createEvolEsp = DB::unprepared("insert into evolucion_especialidad (evolucion_id,especialidad_id) values ($evolucion->id, $request->selectEspecialidad);");
        $createEvolSuc = DB::unprepared("insert into evolucion_sucursal (evolucion_id,sucursal_id) values ($evolucion->id, $request->selectSucursal);");
        for ($i=0; $i < 2; $i++) {
            $createEvolUser = DB::unprepared("insert into evolucion_user (evolucion_id,user_id) values ($evolucion->id, $array_users[$i]);");
        }
        session()->flash('NotifYes', 'Evolucion creada correctamente');
        return redirect()->route('buscar_paciente');
    }
    public function delete_evolucion(Request $request)
    {

        $evolucion = evolucion::find($request->evolucion);
        $evolucion->delete();
        session()->flash('NotifYes', 'Evolucion eliminada correctamente');
        return redirect()->route('buscar_paciente');
    }
}
