@extends('layouts.app')

@section('content')
<div class="container mr-0 " >


    <div class="row">

    <div class="col-md-6">
        <img class="sm:rounded-lg" width="100%" height="auto" src="{{ asset("ladoiz.jpg") }}"style ="display:block;"/>
    </div>


        <div class="col-md-6">
        <div class="row align-self-end">
                    <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">


                 <form method="POST" action="{{ route('inicio') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="matricula" class="col-md-4 col-form-label text-md-end">{{ __('matricula') }}</label>

                            <div class="col-md-6">
                                <input id="matricula" type="text" class="form-control @error('matricula') is-invalid @enderror" name="matricula" value="{{ old('matricula') }}" required autocomplete="matricula" autofocus
                                    onkeyup="
                                    var start = this.selectionStart;
                                    var end = this.selectionEnd;
                                    this.value = this.value.toUpperCase();
                                    this.setSelectionRange(start, end);
                                    "
                                >

                                @error('matricula')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                                <a class="btn btn-link" type="submit" href="{{ route("view-remember-password") }}">
                                    Olvid&oacute; su contraseña?
                                </a>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('contraseña.request'))
                                    <a class="btn btn-link" href="{{ route('contraseña.request') }}">
                                        {{ __('Forgot Your contraseña?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>

        </div>
    </div>
</div>
@endsection
