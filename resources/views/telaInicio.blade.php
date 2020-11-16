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
    <title>Inicio</title>
</head>
<body>

    <div class="container box">

        <br>

        @if(isset(Auth::user()->usuario))
        <div class="alert alert-success success-block">
            Bem vindo, <strong>{{ Auth::user()->usuario}}</strong>
            
            <a href="{{ url('/') }}" style="float: right">Sair</a>            
        </div>
        @else
            <script>window.location = "/login";</script>
        @endif
        <br>
        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>{{ $message }}</strong>
            </div>
        @endif
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-body">
                    <form method="POST" action="{{ action('InicioController@pesquisa')}}" style="margin: 100px auto auto auto; text-align: center;">
                        
                        @csrf 
                
                        <label for="busca">Busque por marcas, modelos ou carros</label>
                        <input type="text" placeholder="Realize uma busca..." name="pesquisa" id="pesquisa" class="form-control" alt="Experimente buscar por marcas ou modelos" required>
                        <br>
                        <input type="submit" value="Capturar" class="btn btn-lg btn-primary">
                        <button type="button" class="btn btn-lg btn-dark"><a href="{{ url('/resultados') }}" style="float: center">Exibir Resultados</a></button>

                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>