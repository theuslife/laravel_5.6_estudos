@extends('layout.body')

@section('title', 'Opções')

@section('content')

<div class="container">
    <div class="row">
        <div class="card mx-auto mt-5">
                <div class="card-body">
                    <h1 class="card-title">Botões</h1>
                    <a href="{{ route('opcoes', 1) }}" role="button" class="btn btn-primary">Azul</a>
                    <a href="{{ route('opcoes', 2) }}" role="button" class="btn btn-danger">Vermelho</a>
                    <a href="{{ route('opcoes', 3) }}" role="button" class="btn btn-success">Verde</a>
                    <a href="{{ route('opcoes', 4) }}" role="button" class="btn btn-warning">Amarelo</a>
                    <a href="{{ route('opcoes', 5) }}" role="button" class="btn btn-light">Branco</a>
                </div>
                <div class="card-footer">
                    <a href="#" class="card-link">É isso</a>
                </div>
            </div>
    </div>
</div>

@endsection