<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Historia Clínica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</head>
<body>
<style>
    .texto_upper
    {
        text-transform: uppercase; 
    }
    .espacio_celdas{
        width: 50%;
    }
</style>

<div class="container">
    <h1 class="text-center text-uppercase">Historia Cl&iacute;nica</h1>
</div>
<br/>
<div class="container mb-10">
    <div>
        <table width="100%">
                <thead>
                    <tr>
                        <th></th>
                        <th align="right" class="espacio_celdas texto_upper font-weight-bold text-center">Evolución y tratamiento</th>
                        <th align="right" class="espacio_celdas texto_upper font-weight-bold text-right">C&oacute;digo: HC N°{{ $evolucion->id }}</th>
                    </tr>
                </thead>
            </table>        
    </div>
    <br/>
    <div>
        <table style="width: 100%;">
            <thead>
            </thead>
            <tbody>
            <tr>
                <td class="espacio_celdas">
                    <img src="{{asset('assets/img/escudo.png')}}" style="width:100px;height:100px;">
                </td>
                <td class="espacio_celdas">
                        <span class="text-uppercase">Sucursal</span>
                        <br>
                        <span class="text-uppercase">Cod. asegurado</span>
                        <br>
                        <span class="text-uppercase">Cod. beneficiario</span>
                        <br>
                        <span class="text-uppercase">Fecha y hora:</span>
                </td>
                <td class="espacio_celdas">
                    @foreach($evolucion->users()->get() as $user)
                        @if($user->id_rol == 1)
                            <span class="text-uppercase">{{ $name_sucursal }}</span>
                            <br>
                            <span class="text-uppercase">{{ $user->matricula }}</span>
                            <br>
                            <span class="text-uppercase">{{ $user->matricula }}</span>
                            <br>
                            <span class="text-uppercase">{{ \Carbon\Carbon::parse($evolucion->created_at)->format('d/m/Y h:m') }}</span>
                        @endif
                    @endforeach
                </td>
            </tr>
            </tbody>    
        </table>
    </div>
    <br/>
    <div>
        <table style="width: 100%;">
            <thead>
            </thead>
            <tbody>
                <tr>
                    @foreach($evolucion->users()->get() as $user)
                        @if($user->id_rol == 1)
                            <td class="espacio_celdas text-center texto_upper font-weight-bold">
                                {{ $user->ap_paterno }}
                            </td>
                            <td class="espacio_celdas text-center texto_upper font-weight-bold">
                                {{ $user->ap_materno }}
                            </td>
                            <td class="espacio_celdas text-center texto_upper font-weight-bold">
                                {{ $user->nombre }}
                            </td>
                        @endif
                    @endforeach
                </tr>
                <tr>
                    <td class="espacio_celdas text-center texto_upper font-weight-bold">
                        Ap paterno
                    </td>
                    <td class="espacio_celdas text-center texto_upper font-weight-bold">
                        Ap materno
                    </td>
                    <td class="espacio_celdas text-center texto_upper font-weight-bold">
                        Nombres
                    </td>
                </tr>
            </tbody>    
        </table>
    </div>        
</div>
<div class="container mt-3">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col" class="text-white bg-info">Fecha</th>
            <th scope="col" class="text-white bg-info">Hora</th>
            <th scope="col" class="text-white bg-info">Descripción de consulta</th>
            <th scope="col" class="text-white bg-info">Conducta</th>
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
</body>
</html>
