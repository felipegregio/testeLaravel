@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <strong>{{ $message }}</strong>
    </div>
@endif

<h1> Dados salvos com sucesso!  </h1>

<h2>Para visualizar os artigos capturados, <a href="{{ url('/resultados') }}">Clique aqui!</a></h2>
<br><br>

<h3>Caso queira voltar à tela inicial, <a href="{{ url('/inicio') }}">Clique aqui</a></h3>