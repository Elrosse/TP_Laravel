@extends("layouts.app")
@section("title", $article->title)
@section("content")

    <div class="container">
        <button class="btn btn-primary" title="Retourner aux articles" id="retourButton">Retourner aux tableaux</button>

        <h1 class="mt-4">{{ $article->title }}</h1>

        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('storage/'.$article->picture) }}" alt="Image de l'article" class="img-fluid">
            </div>

            <div class="col-md-6">
                <div class="mt-4">
                    <p class="lead">{{ $article->description }}</p>
                </div>

                <div class="mt-4">
                    <p class="h3">Prix : {{ $article->price }} €</p>
                </div>

                <div class="mt-4">
                    <p class="h3">Stock : {{ $article->stock }}</p>
                </div>
                <div class="mt-4">
                    <a href="#" class="btn btn-success" title="Acheter">Acheter</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById("retourButton").addEventListener("click", function() {
            history.back();
        });
    </script>

@endsection
