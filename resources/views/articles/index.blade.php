@extends("layouts.app")
@section("title", "Tous les articles")
@section("content")

    <div class="container">
        <h1 class="mt-4">Tous les tableaux</h1>

        @if (request()->route()->getName() === 'articles.index')
            <a href="{{ route('articles.create') }}" class="btn btn-primary mb-3" title="Créer un article">Ajouter un
                nouveau tableau</a>
        @endif

        <div class="row">
            @foreach ($articles as $article)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card h-100">
                        <div class="card-header">
                            <h5 class="card-title font-weight-bold">{{ $article->title }}</h5>
                        </div>

                        <div class="card-body flex-column d-flex">
                            <img src="{{ asset('storage/' . $article->picture) }}" class="card-img-top"
                                 style="max-height: 300px;" alt="image">
                            <h5 class="card-text font-weight-bold mt-auto text-center"
                                style="font-size: 24px;">{{ $article->price }} €</h5>
                        </div>

                        <div class="d-flex justify-content-between card-footer mt-auto">
                            @if (request()->route()->getName() === 'articles.index')
                                <a href="{{ route('articles.show', $article) }}" style="width: 30%"
                                   class="btn btn-primary btn-sm" title="Voir l'article">Voir</a>
                            @else
                                <a href="{{ route('articles.show', $article) }}" style="width: 30%"
                                   class="btn btn-primary btn-sm mx-auto" title="Voir l'article">Voir</a>
                            @endif
                            @if (request()->route()->getName() === 'articles.index')
                                <a href="{{ route('articles.edit', $article) }}" style="width: 30%"
                                   class="btn btn-warning btn-sm" title="Modifier l'article">Modifier</a>
                                <form method="POST" style="width: 30%"
                                      action="{{ route('articles.destroy', $article)}}">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-danger btn-sm mx-auto"
                                            title="Supprimer l'article">Supprimer
                                    </button>
                                    @endif
                                </form>
                        </div>

                    </div>
                </div>
            @endforeach

                <div class="d-flex justify-content-center">
                        {{ $articles->links() }}

                </div>
        </div>
    </div>
@endsection
