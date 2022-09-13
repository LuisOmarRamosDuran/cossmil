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
            'user_id' => $paciente,
        ]);
        $createEvolEsp = DB::unprepared("insert into evolucion_especialidad (evolucion_id,especialidad_id) values ($evolucion->id, $request->selectEspecialidad);");
        $createEvolSuc = DB::unprepared("insert into evolucion_sucursal (evolucion_id,sucursal_id) values ($evolucion->id, $request->selectSucursal);");
        for ($i=0; $i < 2; $i++) {
            $createEvolUser = DB::unprepared("insert into evolucion_user (evolucion_id,user_id) values ($evolucion->id, $array_users[$i]);");
        }
        session()->flash('NotifYes', 'Evolucion creada correctamente');
        return redirect()->route('buscar_paciente');
    }

    public function indexUpdate(evolucion $evolucion)
    {
        $sucursales = sucursal::all();
        $especialidades = especialidad::all();
        $users_evolucion = $evolucion->users()->get();
        foreach ($users_evolucion as $user)
        {
            if($user->id_rol == 1)
            {
                $users_evolucion_paciente = $user->matricula;
            }
            else if ($user->id_rol == 2)
            {
                $users_evolucion_medico = $user->nombre . " " . $user->ap_paterno . " " . $user->ap_materno;
            }
        }
//        dd($users_evolucion_paciente." ".$users_evolucion_medico);
//        dd($evolucion->sucursales()->first()->id);
        return view('adminlte.medico.update_historia_clinica', compact('evolucion', 'sucursales', 'especialidades', 'users_evolucion_paciente', 'users_evolucion_medico'));
    }

    public function update_historia_clinica(Request $request)
    {
        $evolucion = evolucion::find($request->id_evolucion);
        $evolucion->diagnostico = $request->textDiagnostico;
        $evolucion->conducta = $request->textConducta;
        $evolucion->save();
        $evolucion->especialidades()->sync($request->selectEspecialidad);
        $evolucion->sucursales()->sync($request->selectSucursal);
        session()->flash('NotifYes', 'Evolucion actualizada correctamente');
        return redirect()->route('buscar_paciente');

//        selectSucursal
//        selectEspecialidad
//        textDiagnostico
//        textConducta
    }

    public function delete_evolucion(Request $request)
    {

        $evolucion = evolucion::find($request->evolucion);
        $evolucion->delete();
        session()->flash('NotifYes', 'Evolucion eliminada correctamente');
        return redirect()->route('buscar_paciente');
    }
}
