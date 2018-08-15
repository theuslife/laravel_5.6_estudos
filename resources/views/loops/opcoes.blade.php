@extends('layout.body')

@section('title', 'Opção escolhida')

@section('content')

<div class="container">
    <div class="row">
        <div class="card mt-5 mx-auto">
            <div class="card-body">
                Você escolheu a opção: 
                @if(isset($opcao))
                    @switch($opcao)
                        @case(1)
                            <span class="badge badge-primary">Azul</span>
                            @break
                        @case(2)
                            <span class="badge badge-danger">Vermelho</span>
                            @break
                        @case(3)
                            <span class="badge badge-success">Verde</span>
                            @break
                        @case(4)
                            <span class="badge badge-warning">Amarelo</span>
                            @break
                        @case(5)
                            <span class="badge badge-light">Branco</span>
                            @break
                        @default
                            <h1>Você não escolheu nenhuma opção</h1>
                            @break
                    @endswitch
                @endif
            </div>
            <div class="card-footer">
                <a href="{{ route('mostrar_opcoes') }}" class="card-link">Voltar</a>
            </div>
    </div>
</div>
@endsection