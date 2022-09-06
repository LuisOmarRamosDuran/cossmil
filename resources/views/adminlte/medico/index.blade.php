@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="text-center">Dashboard Vista medico</h1>
@stop

@section('content')
    @if(session()->has('NotifYes'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Notificacion</strong> {{ session()->get('NotifYes') }}
        </div>
    @endif
    @if(session()->has('NotifNo'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Notificacion</strong> {{ session()->get('NotifNo') }}
        </div>
    @endif
    <div class="container">
        <div class="row justify-content-center align-items-center vh-50">
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-header">
                        <img src="{{ asset('assets/img/escudo.png') }}" alt="escudo" class="mb-4">
                        <h3 class="card-title font-weight-bold text-uppercase">Bienvenido a tu historial digital cossmil</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('buscar_paciente.envio') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                @if(auth()->user()->id_rol == 3)
                                    <label for="exampleInputEmail1">Buscar usuarios</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="matricula" aria-describedby="emailHelp" placeholder="Ingresa tu matricula">
                                @else
                                    <label for="exampleInputEmail1">Buscar paciente</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="matricula" aria-describedby="emailHelp" placeholder="Ingresa tu matricula">
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary btn-block rounded">Buscar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
