@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
    <div class="container mb-10">
        <div class="row">
            <div class="col-md-4">

            </div>
            <div class="col-md-4">
                <span class="font-weight-bold text-uppercase d-flex justify-content-center">Evolución y tratamiento</span>
            </div>
            <div class="col-md-4">
                <span>codigo</span>
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
