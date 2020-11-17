<!DOCTYPE html>
<html lang="pt-BR">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <!--script type="text/javascript" src="js/angular.min.js"></script-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resultados</title>
</head>
<body>
@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <strong>{{ $message }}</strong>
    </div>
@endif

<h1 class="col-3">Lista de artigos</h1><br>

<div class="col-8">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>Código carro</th>
                <th>Nome Veículo</th>
                <th>Link</th>
                <th>Ano</th>
                <th>Combustível</th>
                <th>Portas</th>
                <th>Quilometragem</th>
                <th>Câmbio</th>
                <th>Cor</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($resultados as $resultado)
            <tr>
                <td>{{$resultado->id}}</td>
                <td>{{$resultado->id_usuario}}</td>
                <td>{{$resultado->nome_veiculo}}</td>
            <td><a href={{$resultado->link}}>{{$resultado->link}}</a></td>
                <td>{{$resultado->ano}}</td>
                <td>{{$resultado->combustivel}}</td>
                <td>{{$resultado->portas}}</td>
                <td>{{$resultado->quilometragem}}</td>
                <td>{{$resultado->cambio}}</td>
                <td>{{$resultado->cor}}</td>
            <td><button class='btn btn-danger'>Deletar</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>