@extends('layouts.app')

@section('content')
<div class="container">
    @forelse ($noticias as $noticia)
    <h1>{{$noticia->title}}</h1>
    <p>{{$noticia->description}}</p><br>
    <b>Autor: {{$noticia->user->name}}</b>
<a href="{{url("/noticia/$noticia->id/update")}}">editar</a>
    <hr>
    @empty
        <p>Nenhuma noticia cadastrada!</p>
    @endforelse
</div>
@endsection
