<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }
    public function login_web(Request $request)
    {
        dd($request->all());
    }

    public function email()
    {
        return 'matricula';
    }

    public function loginUser(Request $request)
    {
        $credenciales = request()->only('matricula', 'password');

        if(Auth::attempt($credenciales))
        {
            if (\auth()->user()->id_rol == 1)
            {
                return redirect()->route('paciente');
            }
            else if (\auth()->user()->id_rol == 2)
            {
                return redirect()->route('buscar_paciente');
            }
        }
        return 'Login fallido';


    }
}
