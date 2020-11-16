<!DOCTYPE html>
<html lang="pt-br">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <!--script type="text/javascript" src="js/angular.min.js"></script-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <head>
        <meta charset="utf-8">
        <meta name="author" content="Felipe Gregio">
        <title>Login</title>
    </head>
    <body>

    <div class="container">    
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="text-align: center">{{ __('Login') }}</div>
                
                    <div class="card-body">

                        @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong>{{ $message }}</strong>
                        </div>
                        @endif

                        <!--@#if(count($errors > 0))
                            <div class="alert alert-danger">
                                <ul>
                                @#foreach($errors->all() as $error)
                                <li>{#{ $error }}</li>
                                @#endforeach
                                </ul>
                            </div>
                        @#endif-->
                        <form method="POST" action="{{ action('LoginController@checaLogin')}}" style="margin: 100px auto auto auto; text-align: center;">
                            {{ csrf_field() }}
                            <h2>Acesso a aplicação</h2><br>
                            
                            <label for="login">Usuário</label>
                            <input style="width: 50%; margin-left: 25%" type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuário" required autofocus>

                            <label for="password">Senha</label>
                            <input style="width: 50%; margin-left: 25%" type="password" class="form-control" id="password" name="password" placeholder="Senha" required>
                            <br>
                            <input name="SendLogin" type="submit" value="Acessar" class="btn btn-lg btn-primary">

                        </form>
                    </div>
                </div>
                <p>Dica: <i>admin</i></p>
            </div>
        </div>
    </div>

        
        </div>
    </body>
</html> 