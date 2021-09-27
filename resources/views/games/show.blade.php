@extends('layouts.main')

@section('title', 'GameX - '.$games->nome)

@section('content')
<main role="main">

    <div class="jumbotron">
        <div class="container">
        <h1 class="display-3">{{$games->nome}}</h1>
        <b>Classificação Indicativa:</b> <br>
        {{$games->classificacaoInd}}<br>
        </div>
    </div>


    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div id="image-container" class="col-md-6">
                <img src="/img/games/{{$games->image}}" class="img-fluid" alt="{{$games->nome}}">
            </div>
            <div id="info-container" class="col-md-6">                
            <b>Descrição</b> <br>
            {{$games->descricao}}<br>
            </a><b>Plataforma</b>
            <ul id="plataforma-list"> 
            @foreach ($games->plataforma as $plataforma)
                <li><ion-icon name=play-outline></ion-icon> <span>{{$plataforma}}</span></li>
            @endforeach
            </ul>
            <b>Requisitos Minimos:</b>
            {{$games->especificacaoMinimo}} <br>
            <b>Requisitos Recomendados:</b>
            {{$games->especificacaoRecomen}} <br>
            </div>
            
        </div>
        <br><b>Jogo cadastrado por:</b>
        {{$gameOwner['name']}}

    </div>
</main>
@endsection