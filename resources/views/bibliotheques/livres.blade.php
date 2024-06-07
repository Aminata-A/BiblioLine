<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Livres</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
        }
        .sidebar {
            min-width: 250px;
            max-width: 250px;
            background-color: #343a40;
            padding: 20px;
        }
        .sidebar h2{
            color: #fff;
            margin-bottom: 35px;
        }
        .sidebar .nav-link.active {
            background-color: #ff009d;
            color: #fff;
        }
        .sidebar .nav-link {
            margin-bottom: 15px;
            color: #fff
        }
        .main-content {
            flex: 1;
            padding: 20px;
        }
        .btn-primary{
           background: #ff009d ;
           border: #ff009d
        }        

    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Biblioline</h2>
        <nav class="nav flex-column">
            <a class="nav-link" href="{{ route('accueil') }}">Accueil</a>
            <a class="nav-link active" href="{{ route('livres') }}">Livres</a>
            <a class="nav-link" href="{{ route('creation') }}">Nouveau</a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container mt-5">
            <!-- Filtre par catégorie -->
            <div class="row mb-4">
                <div class="col-md-12">
                    <form action="{{ route('livres') }}" method="GET" class="form-inline">
                        <div class="form-group">
                            <label for="categorie" class="mr-2">Filtrer par catégorie:</label>
                            <select name="categorie_id" id="categorie" class="form-control">
                                <option value="">Toutes les catégories</option>
                                @foreach ($categories as $categorie)
                                    <option value="{{ $categorie->id }}" {{ $categorie_id == $categorie->id ? 'selected' : '' }}>{{ $categorie->libelle }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary ml-2">Filtrer</button>
                    </form>
                </div>
            </div>

            <!-- Liste des livres -->
            <div class="row">
                @foreach ($livres as $livre)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ $livre->image }}" class="card-img-top" alt="{{ $livre->titre }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $livre->titre }}</h5>
                                <p class="card-text">{{ $livre->auteur }}</p>
                                <a href="{{ route('detail', $livre->id) }}" class="btn btn-primary">Détails</a>
                                <a href="{{ route('supprimer', $livre->id) }}" class="btn btn-danger">Supprimer</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
