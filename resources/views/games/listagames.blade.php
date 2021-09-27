@extends('layouts.main')

@section('title', 'GameX - Games')

@section('content')
    <main role="main">
        <div class="jumbotron">
            <div class="container">
              @if ($search)
              <h1 class="display-3">Você busca por: {{$search}}</h1>
              @else
                <h1 class="display-3">Jogos da nossa lista</h1>
              @endif
            </div>
        </div>
        <div class="col-md-10 offset-md-1">
        <section class="mostraGames">
            @foreach ($games as $games)
              <h1><a class='btn btn-dark' href="/games_{{$games->id}}"> {{$games->nome}} </h1>
              <img href="/games_{{$games->id}}" src="/img/games/{{$games->image}}" class="img-fluid" width="360" alt="sem foto"><br>
              </a><br><b>Plataforma</b>
              <ul id="plataforma-list"> 
                @foreach ($games->plataforma as $plataforma)
                    <li><span>{{$plataforma}}</span></li>
                @endforeach
              </ul>
            @endforeach
            
        </section>
        </div>
        
    </main>

      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
        <script src="../../assets/js/vendor/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
@endsection