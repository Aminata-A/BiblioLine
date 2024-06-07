<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Détails du Livre</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="{{ $livre->image }}" class="card-img" alt="Image du livre">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h1 class="card-title">{{ $livre->titre }}</h1>
                        <p class="card-text"><strong>Date de publication:</strong> {{ $livre->date_de_publication }}</p>
                        <p class="card-text"><strong>Nombre de pages:</strong> {{ $livre->nombre_de_pages }}</p>
                        <p class="card-text"><strong>Auteur:</strong> {{ $livre->auteur }}</p>
                        <p class="card-text"><strong>ISBN:</strong> {{ $livre->isbn }}</p>
                        <p class="card-text"><strong>Éditeur:</strong> {{ $livre->editeur }}</p>
                        <p class="card-text"><strong>Catégorie:</strong> {{ $livre->categorie->libelle }}</p>
                        <p class="card-text"><strong>Rayon:</strong> {{ $livre->rayon->libelle }}</p>
                        <a href="{{ route('modifier', $livre->id) }}" class="btn btn-warning">Modifier</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
