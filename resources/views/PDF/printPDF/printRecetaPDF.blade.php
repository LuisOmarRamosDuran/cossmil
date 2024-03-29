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

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center text-uppercase">Receta</h1>
        </div>
    </div>
</div>
<div class="container mb-10">
    <div class="row">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
            <span>{{ $code }}</span>
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
                <span class="text-uppercase">{{ $user_matricula->matricula }}</span>
            </div>
            <div class="col-md-4">

            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <span class="text-uppercase">Cod. beneficiario</span>
            </div>
            <div class="col-md-4">
                <span class="text-uppercase">{{ $user_matricula->matricula }}</span>
            </div>
            <div class="col-md-4">

            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <span class="text-uppercase">Fecha y hora:</span>
            </div>
            <div class="col-md-4">
                <span class="text-uppercase">{{ \Carbon\Carbon::parse($receta->created_at)->format('d/m/Y h:m') }}</span>
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
            <div class="col-md-4">
                <span class="text-uppercase">{{ $user_matricula->ap_paterno }}</span>
            </div>
            <div class="col-md-4">
                <span class="text-uppercase">{{ $user_matricula->ap_materno }}</span>
            </div>
            <div class="col-md-4">
                <span class="text-uppercase">{{ $user_matricula->nombre }}</span>
            </div>
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
            <th scope="col">Medicamento</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Aplicación de medicamento</th>
        </tr>
        </thead>
        <tbody>
        <tr class="font-weight-bold">
            <th scope="row">{{ \Carbon\Carbon::parse($receta->created_at)->format('d/m/Y')}}</th>
            <td>{{ \Carbon\Carbon::parse($receta->created_at)->format('h:m')}}</td>
            <td>{{ $receta->medicamento }}</td>
            <td>{{ $receta->cantidad }}</td>
            <td>{{ $receta->aplicacionMedicamento }}</td>
        </tr>
        </tbody>
    </table>
</div>
<div class="container">
    <div class="row font-weight-bold">
        <span class="text-uppercase">M&eacute;dico responsable:</span><p>&nbsp; Dr. {{ $user_medico->nombre .' '. $user_medico->ap_paterno .' '. $user_medico->ap_materno }}</p>
    </div>
</div>
</body>
</html>
