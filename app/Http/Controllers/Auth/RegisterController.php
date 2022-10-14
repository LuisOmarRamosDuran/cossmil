<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombre'                => ['required', 'string', 'max:255'],
            'apellido_paterno'      => ['required', 'string', 'max:255'],
            'apellido_materno'      => ['required', 'string', 'max:255'],
            'carnet_asegurado'      => ['required', 'string', 'max:255'],
            'fecha_nacimiento'      => ['required', 'date', 'max:255'],
            'tipo_user'             => ['required', 'integer', 'max:255'],
            'fuerza'                => ['required', 'string', 'max:255'],
            'tipo_sangre'           => ['required', 'string', 'max:255'],

            'password'              => ['required', 'string', 'min:8'],
        ]);
    }

    public function create_user(Request $request)
    {

        /*$validator = $this->validator([
            'nombre'                => $request->nombre,
            'apellido_paterno'      => $request->apellido_paterno,
            'apellido_materno'      => $request->apellido_materno,
            'apellido_esposo'       => $request->apellido_esposo,
            'carnet_asegurado'      => $request->carnet_asegurado,
            'carnet_beneficiario'   => $request->carnet_beneficiario,
            'id_grado'              => $request->id_grado,
            'fecha_nacimiento'      => $request->fecha_nacimiento,
            'tipo_user'             => $request->tipo_user,
            'fuerza'                => $request->fuerza,
            'tipo_sangre'           => $request->tipo_sangre,

            'password'              => $request->password,
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }*/
        //

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
        $user = User::create([
            'nombre'                => $request->nombre,
            'ap_paterno'            => $request->apellido_paterno,
            'ap_materno'            => $request->apellido_materno,
            'ap_esposo'             => $request->apellido_esposo,
            'carnet_asegurado'      => $fecha_a . $feche_mes . $feche_dia . $ApellidoPat . $ApellidoMat . $Name ,
            'carnet_beneficiario'   => $request->carnet_beneficiario,
            'ci'                    => $request->ci,
            'grado'                 => $request->id_grado,
            'fecha_nacimiento'      => $request->fecha_nacimiento,
            'id_rol'                => $request->tipo_user,
            'id_genero'             => $request->tipo_genero,
            'fuerza'                => $request->fuerza,
            'tipo_sangre'           => $request->tipo_sangre,
            'password'              => Hash::make($request->ci),
            'matricula'             => $fecha_a . $feche_mes . $feche_dia . $ApellidoPat . $ApellidoMat . $Name ,

        ]);
        Log::info('El usuario'. auth()->user()->id .' ha creado un usuario con el id: '. $user->id);
        return redirect()->route("home");
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([

            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
