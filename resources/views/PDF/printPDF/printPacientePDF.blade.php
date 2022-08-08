@extends('adminlte::page')

@section('title', 'Historia Clínica')

@section('content_header')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center text-uppercase">Historia Cl&iacute;nica</h1>
            </div>
        </div>
    </div>
@stop

@section('content')
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
        <div class="container font-weight-bold">
            <div class="row">
                <div class="col-md-4">
                    <span class="text-uppercase">Sucursal</span>
                </div>
                <div class="col-md-4">
                    <span class="text-uppercase">{{ $name_sucursal }}</span>
                </div>
                <div class="col-md-4">

                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <span class="text-uppercase">Cod. asegurado</span>
                </div>
                <div class="col-md-4">
                    <span class="text-uppercase">{{ auth()->user()->matricula }}</span>
                </div>
                <div class="col-md-4">

                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <span class="text-uppercase">Cod. beneficiario</span>
                </div>
                <div class="col-md-4">
                    <span class="text-uppercase">{{ auth()->user()->matricula }}</span>
                </div>
                <div class="col-md-4">

                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <span class="text-uppercase">Fecha y hora:</span>
                </div>
                <div class="col-md-4">
                    <span class="text-uppercase">{{ \Carbon\Carbon::parse($evolucion->created_at)->format('d/m/Y h:m') }}</span>
                </div>
                <div class="col-md-4">

                </div>
            </div>
            <div class="row mt-4 mb-4">
                <div class="col-md-12 text-uppercase font-weight-bold d-flex justify-content-center">
                    paciente
                </div>
            </div>
            <div class="row text-center">
                @foreach($evolucion->users()->get() as $user)
                    @if($user->id_rol == 1)
                        <div class="col-md-4">
                            <span class="text-uppercase">{{ $user->ap_paterno }}</span>
                        </div>
                        <div class="col-md-4">
                            <span class="text-uppercase">{{ $user->ap_materno }}</span>
                        </div>
                        <div class="col-md-4">
                            <span class="text-uppercase">{{ $user->nombre }}</span>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="row text-center font-weight-bold">
                <div class="col-md-4">
                    <span class="text-uppercase">Ap paterno</span>
                </div>
                <div class="col-md-4">
                    <span class="text-uppercase">Ap materno</span>
                </div>
                <div class="col-md-4">
                    <span class="text-uppercase">nombres</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-3">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">Fecha</th>
                <th scope="col">Hora</th>
                <th scope="col">Descripción de consulta</th>
                <th scope="col">Conducta</th>
            </tr>
            </thead>
            <tbody>
            <tr class="font-weight-bold">
                <th scope="row">{{ \Carbon\Carbon::parse($evolucion->created_at)->format('d/m/Y')}}</th>
                <td>{{ \Carbon\Carbon::parse($evolucion->created_at)->format('h:m')}}</td>
                <td>{{ $evolucion->diagnostico }}</td>
                <td>{{ $evolucion->conducta }}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="container">
        <div class="row font-weight-bold">
            @foreach($evolucion->users()->get() as $user)
                @if($user->id_rol == 2)
                    <span class="text-uppercase">M&eacute;dico responsable:</span><p>&nbsp; Dr. {{ $user->nombre .' '. $user->ap_paterno .' '. $user->ap_materno }}</p>
                @endif
            @endforeach
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset("/js/jquery.printPage.js") }}" ></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.btnprn').printPage();
        });
    </script>
@stop
