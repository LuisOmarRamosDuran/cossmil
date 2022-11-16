@extends('adminlte::page')

@section('title', 'Paciente')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
@stop

@section('content_header')
    <h1 class="text-center text-uppercase">Historial Cl&iacute;nico digital</h1>
@stop

@section('content')
    <table id="historia_clinica" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Sucursal</th>
                <th>Especialidad</th>
                <th>Paciente - M&eacute;dico</th>
                <th>Diagn&oacute;stico</th>
                <th>Acci&oacute;n</th>
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
                        <a href="{{ route('index.historia', ['evolucion' => $data]) }}" class="href">
                            <button type="button" class="btn btn-success">Ver</button>
                        </a>
                    </td>
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
            </tr>
        </tfoot>
    </table>
{{--    <div class="d-flex justify-content-center">--}}
{{--        <button class="btn btn-danger text-white"><a href="{{ route("index_receta", ["id_user" => $user_matricula->id]) }}" target="_blank" class="text-white">Recetas</a></button>--}}
{{--        <button class="btn btn-danger text-white"><a href="#" target="_blank" class="text-white">Laboratorios</a></button>--}}
{{--    </div>--}}


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
                    "lengthMenu": "Mostrar _MENU_ registros por p&aacute;gina",
                    "zeroRecords": "No se encontraron resultados en su b&uacute;squeda",
                    "searchPlaceholder": "Buscar registros",
                    "info": "Mostrando registros de _START_ al _END_ de un total de _TOTAL_ registros",
                    "infoEmpty": "No existen registros",
                    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "search": "Buscar:",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                }
            });
    </script>
@stop
