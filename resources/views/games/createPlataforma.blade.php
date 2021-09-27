@extends('layouts.main')

@section('title', 'GameX - Adicionar Plataforma')

@section('content')
    <main role="main">
        <div class="jumbotron">
            <div class="container">
            <h1 class="display-3">Adicionar Plataforma</h1>
            </div>
        </div>

        <div id="plataforma-create-container" class="col-md-6 offset-md-3">
            <form action="/plataformaCreate" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nomePlat">Plataforma:</label>
                    <input type="text" class="form-control" id="nomePlat" name="nomePlat" placeholder="Nome da plataforma">
                </div>
                <input type="submit" class="btn btn-primary" value="Adicionar Plataforma">
            </form>
        </div>

    </main>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
        <script src="../../assets/js/vendor/popper.min.js"></script>
        <script src="js/bootstrap.min.js">
    </script>
@endsection