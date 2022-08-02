@extends('adminlte::page')

@section('title', 'paciente')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
@stop

@section('content_header')
    <h1>Paciente es te es el middleware</h1>
@stop

@section('content')

        {{-- @if(auth()->user()->id_rol == 2)
            <p>Welcome {{ auth()->user()->nombre }}</p>
        @endif--}}
        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">cerrar
                                    {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    <table id="historia_clinica" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Sucursal</th>
                <th>Especialidad</th>
                <th>M&eacute;dico</th>
                <th>Diagn&oacute;stico</th>
                <th>Acci&oacute;n</th>
            </tr>
        </thead>
        <tbody>
{{--            @foreach ($data as $data_view)--}}
{{--                <tr>--}}
{{--                    <td>{{ $data_view->diagnostico }}</td>--}}
{{--                    @if($data_view->user->tipo_user == 2)--}}
{{--                        <td>{{ $data_view->user->nombre }}</td>--}}
{{--                    @endif--}}
{{--                    <td>Edinburgh</td>--}}
{{--                    <td>61</td>--}}
{{--                    <td>2011-04-25</td>--}}
{{--                    <td>--}}
{{--                        <button type="button" class="btn btn-success">Ver</button>--}}
{{--                    </td>--}}
{{--                </tr>    --}}
{{--            @endforeach--}}
        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
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
                "order": [[ 4, "desc" ]]
            });
    </script>
@stop
