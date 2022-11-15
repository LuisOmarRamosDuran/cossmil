@extends('adminlte::page')

@section('title', 'Médico')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
@stop

@section('content_header')
    <h1 class="text-center text-uppercase">Historial Cl&iacute;nico digital Medico</h1>
    <h1 class="text-info text-md">Historia clínica del paciente 
        {{ $user_matricula->nombre . " " . $user_matricula->ap_paterno. " " . $user_matricula->ap_materno}}
    </h1>
    <div class="d-flex justify-content-end">
        <button class="btn btn-warning">
            <a href="{{ route('add_historia_clinica') }}" class="text-dark">Añadir historia cl&iacute;nica</a>
        </button>
    </div>
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
    <table id="historia_clinica" class="table table-striped table-bordered" style="width:100%">
        <thead>
        <tr>
            <th>Fecha</th>
            <th>Sucursal</th>
            <th>Especialidad</th>
            <th>Paciente - M&eacute;dico</th>
            <th>Diagn&oacute;stico</th>
            <th>Acci&oacute;n</th>
            @if(Auth::user()->id_rol == 3)
                <th>Eliminar</th>
            @endif
        </tr>
        </thead>
        <tbody>
        @foreach ($user_evoluciones as $data)
            <tr>
                <td>{{ $data->created_at }}</td>
                @foreach($data->sucursales as $sucursal)
                    <td>{{ $sucursal->nombre }}</td>
                @endforeach
                {{--                    @if($data->user->tipo_user == 2)--}}
                {{--                        <td>{{ $data->user->nombre }}</td>--}}
                {{--                    @endif--}}
                @foreach($data->especialidades as $especialidad)
                    <td>{{ $especialidad->nombre }}</td>
                @endforeach
                
                <td>
                    @foreach($data->users as $user)
                        {{ $user->nombre." ". $user->ap_paterno." ". $user->ap_materno}} - 
                    @endforeach
                </td>
                

                <td>{{ $data->diagnostico }}</td>
                <td>
                    <div class="d-flex container justify-content-center">
                        <div class="row">
                            <div class="col">
                                <a href="{{ route('index.historia', ['evolucion' => $data]) }}" class="href">
                                    <button type="button" class="btn btn-success">Visualizar</button>
                                </a>
                                <a href="{{ route('update_historia_clinica', ['evolucion' => $data]) }}" class="href">
                                    <button type="button" class="btn btn-warning">Modificar</button>
                                </a>
                            </div>                        
                        </div>    
                    
                    </div>
                </td>
                @if(Auth::user()->id_rol == 3)
                    <td>
                        <form action="{{ route('delete.historia', ['evolucion' => $data]) }}" method="post">
                            @csrf
                            @method('POST')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                @endif
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>Fecha</th>
            <th>Sucursal</th>
            <th>Especialidad</th>
            <th>Paciente - M&eacute;dico</th>
            <th>Diagn&oacute;stico</th>
            <th>Acci&oacute;n</th>
            @if(Auth::user()->id_rol == 3)
                <th>Eliminar</th>
            @endif
        </tr>
        </tfoot>
    </table>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>

    <script>
        $("#historia_clinica").DataTable({
            responsive : true,
            autoWidth: false,
            "order": [[ 4, "desc" ]],
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "Nada encontrado - disculpa",
                "info": "Mostrando la página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(filtrando from _MAX_ registros totales)",
                "search": "Buscar:",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
        });
    </script>
@stop
