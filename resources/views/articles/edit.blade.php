@extends("layouts.app")
@section("title", "Créer un article")
@section("content")

    @if (isset($article))
        <h1 style="margin-left: 45px">Éditer un article</h1>
        <form method="POST" action="{{ route('articles.update', $article) }}" enctype="multipart/form-data">
            @method('PUT')
            @else
                <h1 style="margin-left: 45px">Créer un article</h1>
                <form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">
                    @endif

                    @csrf
                    <div class="form-group" style="margin-left: 25px">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Nom</label>
                                    <input type="text" name="title" class="form-control" value="{{ isset($article->title) ? $article->title : old('title') }}" id="title" placeholder="Le nom de l'article">
                                    @error("title")
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="mb-3">
                                    <label for "description" class="form-label">Description</label>
                                    <textarea name="description" class="form-control form-control-short" id="description" lang="fr" rows="5" placeholder="La description de l'article">{{ isset($article->description) ? $article->description : old('description') }}</textarea>
                                    @error("description")
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="price" class="form-label">Prix</label>
                                    <input type="number" name="price" class="form-control form-control-short" value="{{ isset($article->price) ? $article->price : old('price') }}" id="price" placeholder="Le prix de l'article">
                                    @error("price")
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="stock" class="form-label">Quantité en stock</label>
                                    <input type="number" name="stock" class="form-control form-control-short" value="{{ isset($article->stock) ? $article->stock : old('stock') }}" id="stock" placeholder="Le stock de l'article">
                                    @error("stock")
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    @if(isset($article->picture))
                                        <div class="mb-3">
                                            <span>Image actuelle</span><br/>
                                            <img src="{{ asset('storage/'.$article->picture) }}" alt="image de couverture actuelle" style="max-height: 200px;">
                                        </div>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label for="picture" class="form-label">Image</label>
                                    <input type="file" name="picture" class="form-control" id="picture">
                                    @error("picture")
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Valider</button>
                    </div>

                </form>
        @endsection
