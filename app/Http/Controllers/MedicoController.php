<?php

namespace App\Http\Controllers;

use App\Models\documento;
use App\Models\especialidad;
use App\Models\evolucion;
use App\Models\laboratorio;
use App\Models\receta;
use App\Models\sucursal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class MedicoController extends Controller
{
    public function index()
    {
        return view('adminlte.medico.index');
    }

    public function subir_archivos(Request $request)
    {
        $archivos = $request->file('file')->store('public/documentos');

        $url = Storage::url($archivos);

        $documento = documento::create([
            'nombre' => "archivo",
            'url' => $url,
            'id_informe' => 16,
        ]);
        Cache::put('documento' . auth()->user()->id, $documento);
    }

    public function crear_laboratorio(Request $request)
    {
        $evolucion = Cache::get('evolucion'.auth()->user()->id);

        $laboratorio_create = laboratorio::create([
            'tipo' => $request->inputTypeLab,
            'id_responsable' => auth()->user()->id,
            'user_id' => $evolucion->user_id,
            'id_evolution' => $evolucion->id,
            'id_documento'  => Cache::get("documento".auth()->user()->id)->id,
        ]);

        session()->flash('NotifYes', 'Laboratorio creado correctamente');
        return redirect()->route('index_laboratorio',$evolucion->user_id);
    }

    public function index_crear_laboratorio($id_user)
    {
        $evolucion = evolucion::find($id_user);
        $laboratorio_count = laboratorio::all()->count();
        if(!Cache::has("evolucion" . auth()->user()->id))
        {
            Cache::put('evolucion' . auth()->user()->id, $evolucion);
        }
        foreach ($evolucion->users as $user) {
            if ($user->id_rol == 1) {
                $user_matricula = $user;
            }
        }
        $sucursales = sucursal::all();
        $especialidades = especialidad::all();
        return view("adminlte.medico.add_laboratorio", compact('evolucion', 'laboratorio_count', 'user_matricula', 'sucursales', 'especialidades'));
    }

    public function index_lab()
    {
        $user_matricula = User::find(auth()->user()->id);
        $user_evoluciones = $user_matricula->evoluciones;

        $user_laboratorio = $user_matricula->laboratorios;


        return view('adminlte.medico.lab_medico', compact('user_laboratorio', 'user_evoluciones', 'user_matricula'));
    }
    public function index_laboratorio($id_user)
    {
        $user_matricula = User::find($id_user);
        $user_evoluciones = $user_matricula->evoluciones;

        $user_laboratorio = $user_matricula->laboratorios;


        return view('adminlte.medico.lab_medico', compact('user_laboratorio', 'user_evoluciones', 'user_matricula'));
    }

    public function buscar_paciente(Request $request)
    {
        $user_matricula = User::where("matricula", $request->matricula)->first();
        $user_evoluciones = $user_matricula->evoluciones;

        return view('adminlte.medico.historia_clinica_medico', compact('user_evoluciones', 'user_matricula'));
    }

    public function index_recetas()
    {
        $user_matricula = User::find(auth()->user()->id);

        $user_evoluciones = $user_matricula->evoluciones;

        $user_recetas = $user_matricula->recetas;

        return view('adminlte.medico.recetas_medico', compact('user_evoluciones', 'user_matricula', 'user_recetas'));
    }
    public function index_receta($id_user)
    {
        $user_matricula = User::find($id_user);

        $user_evoluciones = $user_matricula->evoluciones;

        $user_recetas = $user_matricula->recetas;

        return view('adminlte.medico.recetas_medico', compact('user_evoluciones', 'user_matricula', 'user_recetas'));
    }

    public function index_crear_receta($id_user)
    {
        $evolucion_find = evolucion::find($id_user);
        Cache::forget("evolucion".auth()->user()->id);
        if(!Cache::has("evolucion" . auth()->user()->id))
        {
            Cache::put('evolucion' . auth()->user()->id, $evolucion_find);
        }
        foreach ($evolucion_find->users as $user) {
            if ($user->id_rol == 1) {
                $user_matricula = $user;
            }
        }
        $sucursales = sucursal::all();
        $especialidades = especialidad::all();
        $recetas_count = receta::all()->count();

        return view("adminlte.medico.add_receta", compact('sucursales', 'especialidades', 'recetas_count', 'user_matricula', 'evolucion_find'));
    }

    public function crear_receta(Request $request)
    {
        $evolucion = Cache::get('evolucion'.auth()->user()->id);

        $receta = receta::create([
            'codigoReceta' => $request->inputCodeReceta,
            'id_responsable' => auth()->user()->id,
            'id_paciente' => $evolucion->user_id,
            'id_evolucion' => $evolucion->id,
            'medicamento' => $request->textMedicamento,
            'cantidad' => $request->inputCant,
            'aplicacionMedicamento' => $request->textAplicacion,
        ]);

        session()->flash('NotifYes', 'Receta creada correctamente');
        return redirect()->route('index_receta', $evolucion->user_id);
    }

    public function ver_receta($id_receta)
    {
        $receta = receta::find($id_receta);
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
        return view("adminlte.medico.receta", compact('receta', 'code', 'name_sucursal', 'user_matricula', 'user_medico'));
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
