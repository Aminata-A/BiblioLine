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
    <div class="main-content">
        
        
        
        
        <div class="container">
            <h1>creation de categorie</h1>
            <div>
                <form action="{{ route('categories.enregistrer', ['id' => $categorie->id]) }}" method="post">
                    @csrf
                </div>
                <div class="mb-3">
                    <label for="libelle" class="form-label">Libelle</label>
                    <input type="text" class="form-control" id="libelle" name="libelle" value="{{$categorie->libelle}}">
                </div>
                <div>
                    <label for="description" class="form-label">description</label>
                    <textarea class="form-control mb-4" name="description" id="description" cols="10" rows="10">{{$categorie->description}}</textarea>
                    
                </div>
                <button type="submit" class="btn btn-primary">Creer</button>
            </form> 
        </div>
        
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