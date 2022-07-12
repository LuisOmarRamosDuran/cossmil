@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register_web') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="nombre" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>

                                @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="apellido_paterno" class="col-md-4 col-form-label text-md-end">{{ __('Apellido paterno') }}</label>

                            <div class="col-md-6">
                                <input id="apellido_paterno" type="text" class="form-control @error('apellido_paterno') is-invalid @enderror" name="apellido_paterno" value="{{ old('apellido_paterno') }}" required autocomplete="apellido_paterno">

                                @error('apellido_paterno')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="apellido_materno" class="col-md-4 col-form-label text-md-end">{{ __('Apellido materno') }}</label>

                            <div class="col-md-6">
                                <input id="apellido_materno" type="text" class="form-control @error('apellido_materno') is-invalid @enderror" name="apellido_materno" required autocomplete="new-apellido_materno">

                                @error('apellido_materno')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="apellido_esposo" class="col-md-4 col-form-label text-md-end">{{ __('Apellido esposo') }}</label>

                            <div class="col-md-6">
                                <input id="apellido_esposo" type="text" class="form-control @error('apellido_esposo') is-invalid @enderror" name="apellido_esposo" required autocomplete="new-apellido_esposo">

                                @error('apellido_esposo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="carnet_asegurado" class="col-md-4 col-form-label text-md-end">{{ __('Carnet_asegurado') }}</label>

                            <div class="col-md-6">
                                <input id="carnet_asegurado" type="text" class="form-control @error('carnet_asegurado') is-invalid @enderror" name="carnet_asegurado" required autocomplete="new-carnet_asegurado">

                                @error('carnet_asegurado')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="carnet_beneficiario" class="col-md-4 col-form-label text-md-end">{{ __('Carnet beneficiario') }}</label>

                            <div class="col-md-6">
                                <input id="carnet_beneficiario" type="text" class="form-control @error('carnet_beneficiario') is-invalid @enderror" name="carnet_beneficiario" autocomplete="new-carnet_beneficiario">

                                @error('carnet_beneficiario')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="ci" class="col-md-4 col-form-label text-md-end">{{ __('CI') }}</label>

                            <div class="col-md-6">
                                <input id="ci" type="text" class="form-control @error('ci') is-invalid @enderror" name="ci" autocomplete="new-ci">

                                @error('ci')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="id_grado" class="col-md-4 col-form-label text-md-end">{{ __('Grado') }}</label>

                            <div class="col-md-6">
                                <input id="id_grado" type="text" class="form-control @error('id_grado') is-invalid @enderror" name="id_grado" autocomplete="new-id_grado">

                                @error('id_grado')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="fecha_nacimiento" class="col-md-4 col-form-label text-md-end">{{ __('Fecha de nacimiento') }}</label>

                            <div class="col-md-6">
                                <input id="fecha_nacimiento" type="date" class="form-control @error('fecha_nacimiento') is-invalid @enderror" name="fecha_nacimiento" required autocomplete="new-fecha_nacimiento">

                                @error('fecha_nacimiento')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="tipo_user" class="col-md-4 col-form-label text-md-end">{{ __('Tipo de usuario') }}</label>
                            <div class="col-md-6">
                                <select id="tipo_user" class="custom-select" name="tipo_user">
                                    <option value="1">Médico</option>
                                    <option value="2">Paciente</option>
                                    <option value="3">Administrador</option>
                                </select>

                                @error('tipo_user')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="fuerza" class="col-md-4 col-form-label text-md-end">{{ __('Fuerza') }}</label>
                            <div class="col-md-6">
                                <select id="fuerza" class="custom-select" name="fuerza">
                                    <option value="Ejercito">Ejercito</option>
                                    <option value="Armada">Armada</option>
                                    <option value="Aerea">Aerea</option>
                                </select>

                                @error('fuerza')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="tipo_sangre" class="col-md-4 col-form-label text-md-end">{{ __('Tipo de Sangre') }}</label>
                            <div class="col-md-6">
                                <select id="tipo_sangre" class="custom-select" name="tipo_sangre">
                                    <option value="A RH+">A RH+</option>
                                    <option value="A RH-">A RH-</option>
                                    <option value="B RH+">B RH+</option>
                                    <option value="B RH-">B RH-</option>
                                    <option value="AB RH+">AB RH+</option>
                                    <option value="AB RH-">AB RH-</option>
                                    <option value="O RH+">O RH+</option>
                                    <option value="O RH-">O RH-</option>
                                </select>

                                @error('tipo_sangre')
                                <span class="invalid-feedback" role="alert"></span>
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                      

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection