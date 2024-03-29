<?php

namespace App\Http\Controllers;

use App\Mail\RestablecerPassword;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class RegisterTempController extends Controller
{
    public function index()
    {
        return view("auth.register-temp");
    }

    public function save_admin(Request $request)
    {
        $fechaaa= Carbon::createFromFormat("Y-m-d",$request->fecha_nacimiento,"America/La_Paz");
        $fecha_with_zero = Carbon::createFromDate($request->fecha_nacimiento);


        if($fechaaa->day >=1 && $fechaaa->day <=9 )
        {
            $feche_dia = "0" . $fechaaa->day;
        }
        else
        {
            $feche_dia = $fechaaa->day;
        }
        if($fechaaa->month>=1 && $fechaaa->month<=9)
        {
            if ($request->tipo_genero == 2)
            {

                $feche_mes = "5" . $fechaaa->month;

            }
            else
            {
                $feche_mes = "0" . $fechaaa->month;
            }
        }
        else
        {
            $feche_mes = $fechaaa->month;
        }


        //dd( $feche_mes);

        $arrayApPat     = str_split($request->apellido_paterno);
        $ApellidoPat    = strtoupper( $arrayApPat[0]);

        $arrayApMat     = str_split($request->apellido_materno);
        $ApellidoMat    = strtoupper($arrayApMat[0]);

        $arrayName      = str_split($request->nombre);
        $Name           = strtoupper($arrayName[0]);

        $fecha_a = Carbon::parse($request->fecha_nacimiento)->format('y');

        $foto= $request->file("foto")->store("public/fotografias");
        $url= Storage::url($foto);
        $user = User::create([
            'id_rol'                => $request->tipo_user,
            'nombre'                => $request->nombre,
            'email'                 => $request->email,
            'ap_paterno'            => $request->apellido_paterno,
            'ap_materno'            => $request->apellido_materno,
            'ap_esposo'             => $request->apellido_esposo,
            'carnet_asegurado'      => $fecha_a . $feche_mes . $feche_dia . $ApellidoPat . $ApellidoMat . $Name ,
            'carnet_beneficiario'   => $request->carnet_beneficiario,
            'ci'                    => $request->ci,
            'foto'                  => $url,
            'grado'                 => $request->id_grado,
            'fecha_nacimiento'      => $request->fecha_nacimiento,
            'id_genero'             => $request->tipo_genero,
            'fuerza'                => $request->fuerza,
            'tipo_sangre'           => $request->tipo_sangre,
            'password'              => Hash::make($request->ci),
            'matricula'             => $fecha_a . $feche_mes . $feche_dia . $ApellidoPat . $ApellidoMat . $Name ,
        ]);
        Log::info('El usuario'. $user->id .' ha creado un usuario con el id: '. $user->id);
        return redirect()->route("home");
    }

    public function updatePassword(Request $request)
    {

        if(Auth::check())
        {
            $request->validate([
                'current_password' => 'required',
                'new_password' => 'required',
                'new_confirm_password' => 'same:new_password',
            ]);
            User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

            session()->flash('message', 'Contraseña actualizada correctamente');

            return redirect()->back()->with('message','Contraseña actualizada correctamente');
        }
        else
        {
            $user = User::where('matricula', $request->matricula)->first();
            if (!empty($user))
            {
                Mail::to($user->email)->send(new RestablecerPassword($user->id));
                return redirect()->back()->with('message','Se ha enviado un correo para restablecer su contraseña');
            }
            else
            {
                return redirect()->back()->with('message','No se ha encontrado el usuario');
            }
        }
    }

    public function updatePassword2(Request $request)
    {
        $user = User::find($request->id_user);
        $user->password = Hash::make($request->new_password);
        $user->save();
        session()->flash('message', 'Contraseña actualizada correctamente');

        return redirect()->back()->with('message','Contraseña actualizada correctamente');
    }

    public function viewChangePassword()
    {

        return view("adminlte.auth.cambiar-password");
    }
    public function viewChangePassword2($id)
    {

        return view("adminlte.auth.cambiar-password", compact('id'));
    }
}
