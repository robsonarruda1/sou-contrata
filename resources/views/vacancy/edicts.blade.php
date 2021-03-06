@extends('layouts.header')
@section('title')
    Cadastro de Professores
@endsection
@section('css')
    <link href="{{URL::asset('/css/style.css')}}" rel="stylesheet">
@endsection

@section('cabecalho')
    FORMULÁRIO DE INSCRIÇÃO
@endsection
@section('username')
{{ "Bem vindo, ". Session::get('user')['user'] }}
@endsection

@section('content')

    <div class="container">
        <p class="formatacao-resumo">
            <ul class="nav nav-tabs">
                <li class="active, link"><a href="#">Edital</a></li>
                <!--<li><a class="link-2" href="#">Convocação</a></li>-->
            </ul>
        </p>
        <?php
        $link = $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."documents".DIRECTORY_SEPARATOR."pdf".DIRECTORY_SEPARATOR."123456789.pdf";
        //C:\xampp\htdocs\sou-contrata\public\documents\pdf\123456789.pdf
        ?>
            <iframe src="http://docs.google.com/gview?url=http://www.manuais.net.br/cyrela/legacy/conteudo/desenhos/101.pdf&embedded=true"
                    style="width:100%; height:500px;padding: 30px;" frameborder="0"></iframe>
        {{--<img src="img/conteudo.jpg"  class="img-responsive, posicao-imagem" alt="conteudo"/>
        <img src="img/calendario.jpg"  class="img-responsive" alt="calendario"/>--}}
        <span class="texto-formatacao">
		Prazo de Inscrição</span><br />
        <span class="texto-formatacao">{{ date_format(date_create($data->edict->date_end), 'd/m/Y') }}
            @if(date_diff(date_create($data->edict->date_end), date_create(now()))->format('%d') > '0')
                (em {{date_diff(date_create($data->edict->date_end), date_create(now()))->format('%d') }} dias)
            @elseif(date_diff(date_create($data->edict->date_end), date_create(now()))->format('%d') == '0')
                Hoje é o ultimo dia
            @endif
        </span>
        @if(!Session::get('user'))
            <div class="botao-posicao">
                <a href="{{route('login')}}"><button type="button" class="btn btn-danger">Login</button></a>
            </div>
            <div class="botao-posicao">

            <a href="{{route('form')}}"><button type="button" class="btn btn-danger">QUERO ME CADASTRAR</button></a>
            </div>
        @else
            <div class="botao-posicao">
                <a href="{{route('personal-data.index')}}"><button type="button" class="btn btn-danger">PROSSEGUIR</button></a>

            </div>
        @endif
    </div>
@endsection

