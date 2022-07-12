<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
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
        
            $user = User::create([
                'nombre'                => $request->nombre,
                'ap_paterno'            => $request->apellido_paterno,
                'ap_materno'            => $request->apellido_materno,
                'ap_esposo'             => $request->apellido_esposo,
                'carnet_asegurado'      => $request->carnet_asegurado,
                'carnet_beneficiario'   => $request->carnet_beneficiario,
                'ci'                    => $request->ci,
                'grado'                 => $request->id_grado,
                'fecha_nacimiento'      => $request->fecha_nacimiento,
                'id_rol'                => $request->tipo_user,
                
                'fuerza'                => $request->fuerza,
                'tipo_sangre'           => $request->tipo_sangre,
                'contraseña'            => Hash::make($request->ci),
                'matricula'             => /*Carbon::createFromFormat('YY/M/D',*/$request->fecha_nacimiento . substr($request->apellido_paterno, 0) . substr($request->apellido_materno, 0). substr($request->nombre, 0),
                
            ]);
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
