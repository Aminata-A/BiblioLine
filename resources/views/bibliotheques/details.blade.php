<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Biblioline</title>
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
            color: #fff;
            
        }
        .main-content {
            flex: 1;
            padding: 20px;
        }


    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>BiblioLine</h2>
        @auth
        <div class="nav-item">
            <span class="nav-link connecter">{{ auth()->user()->name }}</span>
        </div>
        @endauth
        <nav class="nav flex-column">

            <a class="nav-link active" href="{{ route('accueil') }}">Accueil</a>
            <a class="nav-link" href="{{ route('livres') }}">Livres</a>
            @auth
            <li class="nav-item">
                <a class="nav-link" href="{{ route('creation') }}">Nouveau</a>
            </li>
            @endauth
            <a class="nav-link" href="{{ route('index') }}">Categories</a>
 
            @auth
            <div class="nav-item">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-link nav-link text-danger">Se déconnecter</button>
                </form>
            </div>
            @endauth
            @guest
            <div class="nav-item">
                <a class="nav-link btn btn-light text-primary" href="{{ route('login') }}">Se connecter</a>
            </div>
            @endguest

        </nav>
    </div>
    
    <!-- Main Content -->
    <div class="main-content">
        <!-- Carrousel -->
        <a class="btn btn-dark mb-5" href="#">Retour</a>

    <div class="container mt-3">
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
                        @auth
                        <a href="{{ route('modifier', $livre->id) }}" class="btn btn-warning">Modifier</a>
                        @endauth
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
