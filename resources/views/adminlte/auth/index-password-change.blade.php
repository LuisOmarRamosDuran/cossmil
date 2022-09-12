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
                    <div class="card-header">Olvid&oacute; su contrase&ntilde;a</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route("cambiar-contrasenaPost") }}">
                            @csrf
                            @foreach ($errors->all() as $error)
                                <p class="text-danger">{{ $error }}</p>
                            @endforeach

                            <div class="form-group row">
                                <label for="matricula" class="col-md-4 col-form-label text-md-right">Matr&iacute;cula</label>

                                <div class="col-md-6">
                                    <input id="matricula" type="text" class="form-control" name="matricula" autocomplete="matricula">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Confirmar
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
