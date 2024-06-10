<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Biblioline</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>

.sidebar {
            min-width: 250px;
            max-width: 250px;
            background-color: #343a40;
            padding: 20px;
            height: 100vh;
            position: fixed;
            color: #fff;
        }
        .sidebar h2 {
            color: #fff;
            margin-bottom: 35px;
            text-align: center;
            font-size: 24px;
        }
        .sidebar .nav-link {
            color: #adb5bd;
            margin-bottom: 15px;
            font-size: 16px;
            transition: background-color 0.3s, color 0.3s;
            padding: 10px 15px;
            border-radius: 5px;
        }
        .sidebar .nav-link:hover {
            background-color: #495057;
            color: #fff;
        }
        .sidebar .nav-link.active {
            background-color: #BF4D19;
            color: #fff;
        }
        .main-content {
            margin-left: 270px;
            padding: 20px;
            flex: 1;
        }
        .container {
            background-color: #f8f9fa; /* Couleur de fond douce */
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Légère ombre */
        }
        
        .card-img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }
        
        .card-body {
            padding: 20px;
        }
        
        .card-title {
            margin-bottom: 20px;
            font-size: 2rem;
            color: #343a40; /* Couleur de titre sombre */
        }
        
        .card-text {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }
        
        .card-text strong {
            color: #495057; /* Couleur de texte forte */
        }
        
        .btn-warning {
            background-color: #ffc107;
            border: none;
            padding: 10px 20px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        .btn-warning:hover {
            background-color: #e0a800;
        }
        
        body {
            display: flex;
            background-color: #f8f9fa;
        }
        
        
        .btn-primary {
            background-color: #343a40;
            border: none;
        }
        footer {
            background-color: rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>BiblioLine</h2>
        <nav class="nav flex-column">
            @auth
            <div class="nav-item">
                <span class="nav-link connecter">{{ auth()->user()->name }}</span>
            </div>
            @endauth
            <a class="nav-link" href="{{ route('accueil') }}">Accueil</a>
            <a class="nav-link active" href="{{ route('livres') }}">Livres</a>
            @auth
            <li class="nav-item">
                <a class="nav-link" href="{{ route('creation') }}">Nouveau</a>
            </li>
            @endauth
            <a class="nav-link" href="{{ route('index') }}">Categories</a>
            <a class="nav-link " href="{{ route('rayons') }}">Rayons</a>
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
        <a class="btn btn-dark mb-5" href="{{ url()->previous() }}">Retour</a>
        
        <div class="container mt-3">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="{{ $livre->image }}" class="card-img" alt="Image du livre">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h1 class="card-title">{{ $livre->titre }}</h1>
                        <p class="card-text">
                            <strong>{{ $livre->titre }}</strong> est un livre écrit par <strong>{{ $livre->auteur }}</strong>,
                            publié le <strong>{{ \Carbon\Carbon::parse($livre->date_de_publication)->format('d/m/Y à H:i') }}</strong>. Il compte <strong>{{ $livre->nombre_de_pages }}</strong>
                            pages et est classé dans la catégorie <strong>{{ $livre->categorie->libelle }}</strong>.
                            L'ISBN de ce livre est <strong>{{ $livre->isbn }}</strong> et il est édité par <strong>{{ $livre->editeur }}</strong>.
                            Ce livre peut être trouvé dans le rayon <strong>{{ $livre->rayon->libelle }}</strong>.
                        </p>
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
