<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title> @yield('title') </title>

        <!-- css -->
         <link href="css/bootstrap.min.css" rel="stylesheet">
         <link href="css/style.css" rel="stylesheet">
        <link href="jumbotron.css" rel="stylesheet">
        <script src="\js\boostrap.js"></script>

    </head>

    <body>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="/">
                <img src="/img/controleicon.png" height="50">
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
      
            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="/">Home <span class="sr-only"></span></a>
                </li>
                
                @guest
                <li class="nav-item">
                  <a class="nav-link" href="/login">Login</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/register">Cadastro</a>
                </li>
                @endguest

                <li class="nav-item">
                    <a class="nav-link" href="/games">Jogos</a>
                  </li>
                  
              @auth
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="/gamesCreate" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Adicionar Jogo</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                  <a class="dropdown-item" href="/gamesCreate">Inserir Jogo</a>
                  <a class="dropdown-item" href="/plataformaCreate">Inserir Plataforma</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="/dashboardPlataforma">Alterar Plataforma</a>
              </li>

              <li class="nav-item">
                <form action="/logout" method="POST">
                  @csrf
                  <a class="nav-link" href="/logout" onclick="event.preventDefault();
                                                              this.closest('form').submit();">Logout</a>
                </form>
              </li>

              @endauth
                
              </ul>
              <form class="form-inline my-2 my-lg-0" action="/games" method="GET">
                <input class="form-control mr-sm-2" type="text" name="search" id="search" placeholder="Pesquisa" aria-label="Search">
                </form>
                @auth
                <a href="/dashboard"><button class="btn btn-outline-success my-2 my-sm-0">Meu Painel</button></a>    
                @endauth
            </div>
          </nav>

          @yield('content')


        <footer class="container">
            <p><p><div class="alert alert-success" role="alert">
                <strong>&copy; R.R. - Rodrigo Ribeiro</strong>
                </div>
        </footer>
      </div>
    </body>
</html>