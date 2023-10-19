@extends("layouts.app")
@section("title", $article->title)
@section("content")

    <h1>{{ $article->title }}</h1>

    <img src="{{ asset('storage/'.$article->picture) }}" alt="Image de l'article" style="max-width: 300px;">

    <div>{{ $article->description }}</div>

    <div>{{ $article->price }}</div>

    <div>{{ $article->stock }}</div>

    <p><a href="{{ route('articles.index') }}" title="Retourner aux articles" >Retourner aux articles</a></p>

@endsection
