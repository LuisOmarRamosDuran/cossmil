@extends('layouts.app')
@section('content')
    <div class="container">
        @if(session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Actualizar la contraseña</div>

                    <div class="card-body">
                        <form method="POST" action="@if(\Illuminate\Support\Facades\Auth::check()){{ route("cambiar-contrasenaPost") }} @else
                        {{ route("cambiar-contrasenaPost2") }}
                         @endif">
                            @csrf
                            @foreach ($errors->all() as $error)
                                <p class="text-danger">{{ $error }}</p>
                            @endforeach

                            @if(\Illuminate\Support\Facades\Auth::check())
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Contrase&ntilde;a actual</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
                                    </div>
                                </div>
                            @else
                            @endif

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Nueva contrase&ntilde;a</label>

                                <div class="col-md-6">
                                    <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Confirmar contrase&ntilde;a</label>

                                <div class="col-md-6">
                                    <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                                </div>
                            </div>

                            @if(empty($id))
                            @else
                                <input id="id_user" name="id_user" type="hidden" value="{{ $id }}">
                            @endif
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Confirmar contrase&ntilde;a
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
