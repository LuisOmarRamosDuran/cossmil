@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="text-uppercase font-weight-bold">Añadir receta</h1>
@stop

@section('content')
    <form method="post" action="{{ route('crear_receta_nueva') }}">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputEmail4">Fecha y Hora</label>
                <div class="input-group date">
                    <input type="datetime-local" id="inputDatetimeNow" name="inputDatetimeNow" value="{{ \Carbon\Carbon::now() }}" class="form-control" required tabindex="-1" onfocus="this.blur()" readonly>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="inputCodeReceta">C&oacute;digo receta</label>
                <input type="text" class="form-control" id="inputCodeReceta" name="inputCodeReceta" value="{{ $recetas_count +1  }}" readonly>
            </div>
            <div class="form-group col-md-4">
                <label for="inputResponsable">Médico responsable</label>
                <input type="text" class="form-control" id="inputResponsable" name="inputResponsable" value="{{ auth()->user()->nombre.' '. auth()->user()->ap_paterno.' '. auth()->user()->ap_materno }}" readonly>
            </div>
{{--            <div class="form-group col-md-4">--}}
{{--                <label for="inputPassword4">Sucursal</label>--}}
{{--                <select name="selectSucursal" class="custom-select">--}}
{{--                    <option selected>Choose...</option>--}}
{{--                    @foreach($sucursales as $sucursal)--}}
{{--                        <option value="{{$sucursal->id}}">{{$sucursal->nombre}}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--            </div>--}}

        </div>
        <div class="form-row">
            <div class="form-group col-md-4 text-uppercase">
                <label for="inputCodAse">cod. asegurado</label>
                <input type="text" name="inputCodAse" class="form-control" id="inputCodAse" value="{{ $user_matricula->nombre . " " . $user_matricula->ap_paterno. " " . $user_matricula->ap_materno }}" readonly>
            </div>
            <div class="form-group col-md-4">
                <label for="exampleFormControlTextarea1">Medicamento</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="textMedicamento" rows="3"></textarea>
            </div>

{{--                <label for="selectEspecialidad">Especialidad</label>--}}
{{--                <select name="selectEspecialidad" class="custom-select">--}}
{{--                    <option selected>Opci&oacute;n...</option>--}}
{{--                    @foreach($especialidades as $especialidad)--}}
{{--                        <option value="{{$especialidad->id}}">{{$especialidad->nombre}}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}

            <div class="form-group col-md-4 text-uppercase">
                <label for="inputZip">Cantidad</label>
                <input type="number" class="form-control" id="inputCant" name="inputCant" min="1" max="200">
            </div>
        </div>
        <div class="form-row d-flex justify-content-center">
{{--            <div class="form-group col-md-4">--}}
{{--                <label>Fecha y hora</label>--}}
{{--                <input type="date-local" name="dateNow" value="{{ \Carbon\Carbon::now()->format('d/m/Y') }}" class="form-control" required readonly>--}}
{{--                <input type="time-local" name="timeNow" value="{{ \Carbon\Carbon::now()->format('h:m:s') }}" class="form-control" required readonly>--}}
{{--            </div>--}}
            <div class="form-group col-md-4">
                <label for="exampleFormControlTextarea1">Aplicaci&oacute;n de medicamento</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="textAplicacion" rows="4"></textarea>
            </div>
{{--            <div class="form-group col-md-4">--}}
{{--                <label for="exampleFormControlTextarea1">Conducta</label>--}}
{{--                <textarea class="form-control" id="exampleFormControlTextarea1" name="textConducta" rows="4"></textarea>--}}
{{--            </div>--}}
        </div>
        {{--        <div class="form-group">--}}
        {{--            <div class="form-check">--}}
        {{--                <input class="form-check-input" type="checkbox" id="gridCheck">--}}
        {{--                <label class="form-check-label" for="gridCheck">--}}
        {{--                    Check me out--}}
        {{--                </label>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        <button type="submit" class="btn btn-success btn-block">Añadir</button>
    </form>
@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
