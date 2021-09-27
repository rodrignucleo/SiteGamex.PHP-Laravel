@extends('layouts.main')

@section('title', 'GameX - Editar '.$games->nome)

@section('content')
    <main role="main">
        <div class="jumbotron">
            <div class="container">
            <h1 class="display-3">Editando {{$games->nome}}</h1>
            </div>
        </div>

        <div id="game-create-container" class="col-md-6 offset-md-3">
            <form action="/gamesupdate_{{$games->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="image"><font color="red">*</font>Imagem do Jogo:</label>
                    <br><input type="file" id="image" name="image" class="from-control-file">
                    <img class='btn btn-dark' width="360" src="img/games/{{$games->image}}" alt="sem foto" class="img-preview">
                </div>
                <div class="form-group">
                    <label for="nome"><font color="red">*</font>Nome do Jogo:</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Jogo" value="{{$games->nome}}">
                </div>
                <div class="form-group">
                    <label for="nome"><font color="red">*</font>Classificação Indicativa:</label>
                    <input type="text" class="form-control" id="classificacaoInd" name="classificacaoInd" placeholder="Idade para jogar" value="{{$games->classificacaoInd}}">
                </div>
                <div class="form-group">
                    <label for="nome"><font color="red">*</font>Descrição:</label>
                    <input type="textarea" class="form-control" id="descricao" name="descricao" placeholder="Descricao do Jogo" value="{{$games->descricao}}">
                </div>


                <div class="form-group row">
                    <div class="col-4">
                        <label for="plataforma"><font color="red">*</font>Plataforma: <br>Não tem? adicione <a href="/plataformaCreate">aqui</a></label>

                        <div class=form-group>
                            @foreach ($plataformas as $plataformas)
                                <input type="checkbox" name="plataforma[]" value="{{$plataformas->nomePlat}}"> {{$plataformas->nomePlat}} <br>
                            @endforeach
                        </div>
                    </div>
                  </div>
                
                <div class="form-group">
                    <label for="nome">Se for console não precisa preencher!</label>
                </div>
                
                <div class="form-group">
                    <label for="nome">Especificação Minima:</label>
                    <input type="textarea" class="form-control" id="especificacaoMinimo" name="especificacaoMinimo" placeholder="Especificacao Min do Jogo" value="{{$games->especificacaoMinimo}}">
                </div>
                <div class="form-group">
                    <label for="nome">Especificação Recomendada:</label>
                    <input type="textarea" class="form-control" id="especificacaoRecomen" name="especificacaoRecomen" placeholder="Especificacao Recomendada" value="{{$games->especificacaoRecomen}}">
                </div>
                <input type="submit" class="btn btn-primary" value="Editar Jogo">
            </form>
        </div>

    </main>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
        <script src="../../assets/js/vendor/popper.min.js"></script>
        <script src="js/bootstrap.min.js">
    </script>
@endsection