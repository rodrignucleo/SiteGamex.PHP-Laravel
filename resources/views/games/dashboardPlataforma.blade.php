@extends('layouts.main')

@section('title', 'GameX - Plataformas')

@section('content')
<main role="main">

    <div class="jumbotron">
      <div class="container">
        <h1 class="display-3">Olá, {{$user->name}}!</h1>
        Edição de plataformas
      </div>
    </div>

    <footer class="container">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Plataforma</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
      
      <tbody>
        @foreach ($plataformas as $plataformas)
            <tr>
              <td scope="row">{{$loop->index + 1}}</td>
              <td> {{$plataformas->nomePlat}}</td>
              <td><a href="/plataformaedit_{{$plataformas->id}}"><button type="button" class="btn btn-warning">Editar</button></a>
                      <form action="/dashboardPlataforma_{{$plataformas->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Deseja excluir esse registro?')" type="submit" class="btn btn-danger">Excluir</button>
                      </form>
              </td>  
            </tr>
        @endforeach
      </tbody>
    </table>
  </footer>

    
</main>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
        <script src="../../assets/js/vendor/popper.min.js"></script>
        <script src="js/bootstrap.min.js">
    </script>

@endsection
