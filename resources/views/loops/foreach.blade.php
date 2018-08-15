@extends('layout.body')
@section('title', 'foreach')

@section('content')
<div class="container">
    @foreach($produtos as $produto)
    <div class="row">
        <p> {{$produto['id']}}: {{ $produto['nome'] }} </p>
    </div>
    @endforeach
    <hr>
    @foreach($produtos as $produto)
    <div class="row">
        <p> {{$produto['id']}}: {{ $produto['nome'] }} </p>
        @if( $loop->first )
            (The first)
        @endif
        @if( $loop->last )
            (The last)
        @endif
    </div>
    @endforeach

</div>
@endsection