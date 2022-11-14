@extends('adminlte::page')

@section('title', 'Médico')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
@stop

@section('content_header')
    <h1 class="text-center text-uppercase">Historial Cl&iacute;nico digital Medico</h1>
    @if(Auth::user()->id_rol == 3 || Auth::user()->id_rol == 2)
        <h1 class="text-info text-md">Laboratorios registrados</h1>
    @endif
    @if(Auth::user()->id_rol == 1)
        <h1 class="text-info text-md">Laboratorios del paciente 
            {{ $user_matricula->nombre . " " . $user_matricula->ap_paterno. " " . $user_matricula->ap_materno}}
        </h1>
    @endif
    
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
            <th>M&eacute;dico</th>
            <th>Laboratorios</th>
            @if(Auth::user()->id_rol == 3 || Auth::user()->id_rol == 3)
                <th>Acci&oacute;n</th>
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
                @foreach($data->users as $medico)
                   @if($medico->id_rol == 2)
                            @if($medico->id_rol == 2 || $medico->id_rol == 3)
                                    <td>
                                        {{ $medico->nombre . " " . $medico->ap_paterno. " " . $medico->ap_materno}}
                                    </td>
                            @endif
                    @else
                        @if($loop->index == 0 )
                            @if($medico->id_rol == 2 || $medico->id_rol == 3)
                                <td>
                                    {{ $medico->nombre . " " . $medico->ap_paterno. " " . $medico->ap_materno}}
                                </td>
                            @endif
                        @endif
                    @endif
                @endforeach
                <td>
                    @forelse($data->laboratorios as $receta)
                        <ul>
                            <li style="list-style: none;">{{ "RC-" . $receta->tipo . "," }}</li>
                        </ul>

                        <a href="{{ asset($receta->documento->url) }}" class="href">
                            <button type="button" class="btn btn-success">Visualizar</button>
                        </a>
                    @empty
                            
                        <h6>No tiene laboratorio</h6>
                    @endforelse
                
                </td>
                @if(Auth::user()->id_rol == 2 || Auth::user()->id_rol == 3)
                    <td>
                        <div class="d-flex justify-content-center">

                            {{--                        <a href="{{ route('update_historia_clinica', ['evolucion' => $data]) }}" class="href">--}}
                            {{--                            <button type="button" class="btn btn-warning">Modificar</button>--}}
                            {{--                        </a>--}}
                            <button class="btn btn-warning">
                                <a href="{{ route('crear_laboratorio', ["id_user" => $data]) }}" class="text-dark">Añadir Laboratorio</a>
                            </button>
                        </div>
                    </td>
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
            <th>M&eacute;dico</th>
            <th>Laboratorios</th>
            @if(Auth::user()->id_rol == 3 || Auth::user()->id_rol == 3)
                <th>Acci&oacute;n</th>
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
