@extends('adminlte::page')

@section('title', 'Historia Clínica')

@section('content_header')
    <div class="container">
        <div class="row">
            <div class="col-md-12 d-flex flex-row-reverse">
                <a href="{{ url('/prnpriview', ["evolucion" => $evolucion]) }}" class="btnprn">
                    <button type="button" class="btn btn-warning rounded text-uppercase text-black shadow-sm">
                        <span class="text-dark font-weight-bold">imprimir</span>
                    </button>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center text-uppercase">Historia Cl&iacute;nica</h1>
            </div>
        </div>
    </div>
@stop
<br>
@section('content')
    <div class="container mb-10">
        <div class="row">
            <div class="col-md-2">

            </div>
            <div class="col-md-8">
                <h3 class="font-weight-bold text-uppercase d-flex justify-content-center">Evolución y tratamiento</h3>
            </div>
            <div class="col-md-2">
                <h5 class="font-weight-bold">{{ $code }}</h5>
            </div>
        </div>
        <br>
        <div class="container font-weight-bold">
            <div class="row">
                <div class="col-md-2">
                    <img src="{{asset('assets/img/escudo.png')}}" style="width:100px;height:100px;">
                </div>
                <div class="col-md-5">
                    <span class="text-uppercase">Sucursal</span>
                    <br>
                    <span class="text-uppercase">Cod. asegurado</span>
                     <br>
                     <span class="text-uppercase">Cod. beneficiario</span>
                     <br>
                     <span class="text-uppercase">Fecha y hora:</span>
                </div>
                <div class="col-md-5">  
                    <span class="text-uppercase">{{ $name_sucursal }}</span>
                    
                    <br>
                    @foreach($evolucion->users()->get() as $user)
                        @if($user->id_rol == 1)
                            <span class="text-uppercase">{{ $user->matricula }}</span>
                            <br>
                            <span class="text-uppercase">{{ $user->matricula }}</span>
                            <br>
                        @endif
                    @endforeach                
                    <span class="text-uppercase">{{ \Carbon\Carbon::parse($evolucion->created_at)->format('d/m/Y h:m') }}</span>
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
{{--    <script src="{{ asset("/js/jquery.printPage.js") }}" ></script>--}}
{{--    <script type="text/javascript">--}}
{{--        $(document).ready(function(){--}}
{{--            $('.btnprn').printPage();--}}
{{--        });--}}
{{--    </script>--}}
@stop
