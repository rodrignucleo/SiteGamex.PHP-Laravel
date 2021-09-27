@extends('layouts.main')

@section('title', 'GameX - Home')

@section('content')
          <main role="main">

            <!-- Principal jumbotron, para a principal mensagem de marketing ou call to action -->
            <div class="jumbotron">
              <div class="container">
                <h1 class="display-3">Olá, gamers!</h1>
                <p>Estou aqui para você, gamer, te auxiliar a achar o SEU JOGO!! Com sinopses e especificação de cada jogo! Espero que goste</p>
              </div>
            </div>
      
            <!-- Carousel de imagens com controle -->
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                
                <div class="carousel-item active">
                  <img class="d-block w-100" src="/img/pacman.jpg" class="img-fluid" height="600" alt="pacman">
                </div>
                @foreach ($games as $games)
                <div class="carousel-item">
                  <a href="/games_{{$games->id}}"> 
                    <img class="d-block w-100" src="/img/games/{{$games->image}}" class="img-fluid" height="600" alt="{{$games->nome}}">
                  </a>
                </div>
                @endforeach
              </div>

              <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Próximo</span>
              </a>
            </div>
          </main>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
        <script src="../../assets/js/vendor/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
@endsection