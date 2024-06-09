<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Biblioline - Livres</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            display: flex;
            background-color: #f8f9fa;
        }
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
        .btn-warning {
            background-color: transparent;
            border: none;
        }
        .btn-primary {
            background-color: #343a40;
            border: none;
        }
        footer {
            background-color: rgba(0, 0, 0, 0.2);
        }
        .card {
            height: 100%;
        }
        .card img {
            height: 400px;
            object-fit: cover;
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
            <a class="nav-link " href="{{ route('accueil') }}">Accueil</a>
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
        <!-- Formulaire de recherche -->
        <div class="container mt-4">
            <form action="{{ route('livres') }}" method="GET" class="form-inline">
                <div class="form-group mx-sm-3 mb-2">
                    <input type="text" name="search" class="form-control" placeholder="Rechercher un livre">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Rechercher</button>
            </form>
        </div>
        
        <!-- Liste des livres -->
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <h2>Nos Livres</h2>
                </div>
                @foreach ($livres as $livre)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <a href="{{ route('detail', $livre->id) }}">
                                <img src="{{ $livre->image }}" class="card-img-top" alt="{{ $livre->titre }}">
                            </a>
                            <div class="card-body">
                                
                                @auth
                                <a href="{{ route('supprimer', $livre->id) }}" class="btn btn-danger">Supprimer</a>
                                @endauth
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        
        <!-- Footer -->
        <footer class="bg-light text-center text-lg-start mt-5">
            <div class="container p-4">
                <div class="row">
                    <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Biblioline</h5>
                        <p>Facilitez la gestion de votre bibliothèque avec Biblioline.</p>
                    </div>
                </div>
            </div>
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2024 Biblioline
            </div>
        </footer>
    </div>
    
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
