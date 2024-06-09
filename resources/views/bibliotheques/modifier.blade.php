<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajouter un Livre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .card-header {
            background-color: #BF4D19;
            color: #fff;
            border-radius: 10px 10px 0 0;
            padding: 10px 20px;
        }
        .form-row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .form-col {
            flex: 1;
            min-width: 200px;
        }
        .error-message {
            color: red;
            font-size: 0.875em;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Biblioline</h2>
        <nav class="nav flex-column">
            @auth
            <div class="nav-item">
                <span class="nav-link connecter">{{ auth()->user()->name }}</span>
            </div>
            @endauth
            <a class="nav-link" href="{{ route('accueil') }}">Accueil</a>
            <a class="nav-link active" href="{{ route('livres') }}">Livres</a>
            @auth
            <a class="nav-link " href="{{ route('creation') }}">Nouveau</a>
            @endauth
            <a class="nav-link" href="{{ route('index') }}">Categories</a>
            <a class="nav-link" href="{{ route('rayons') }}">Rayons</a>
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
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h2>Modifier un Livre</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('enregistrer', ['id' => $livre->id]) }}" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="form-col mb-3">
                                <label for="titre" class="form-label">Titre</label>
                                <input type="text" class="form-control" id="titre" name="titre"  value="{{ old('titre', $livre->titre) }}">
                                @error('titre')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-col mb-3">
                                <label for="auteur" class="form-label">Auteur</label>
                                <input type="text" class="form-control" id="auteur" name="auteur"  value="{{ old('auteur', $livre->auteur) }}">
                                @error('auteur')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-col mb-3">
                                <label for="image" class="form-label">Image (URL)</label>
                                <input type="url" class="form-control" id="image" name="image"  value="{{ old('image', $livre->image) }}">
                                @error('image')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-col mb-3">
                                <label for="date_de_publication" class="form-label">Date de Publication</label>
                                <input type="date" class="form-control" id="date_de_publication" name="date_de_publication"  value="{{ old('date_de_publication', $livre->date_de_publication) }}">
                                @error('date_de_publication')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-col mb-3">
                                <label for="nombre_de_pages" class="form-label">Nombre de Pages</label>
                                <input type="number" class="form-control" id="nombre_de_pages" name="nombre_de_pages"  value="{{ old('nombre_de_pages', $livre->nombre_de_pages) }}">
                                @error('nombre_de_pages')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-col mb-3">
                                <label for="isbn" class="form-label">ISBN</label>
                                <input type="number" class="form-control" id="isbn" name="isbn"  value="{{ old('isbn', $livre->isbn) }}">
                                @error('isbn')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-col mb-3">
                                <label for="editeur" class="form-label">Éditeur</label>
                                <input type="text" class="form-control" id="editeur" name="editeur"  value="{{ old('editeur', $livre->editeur) }}">
                                @error('editeur')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-row">
                                <div class="form-col mb-3">
                                    <label for="rayon_id" class="form-label">Rayon</label>
                                    <select class="form-control" id="rayon_id" name="rayon_id" >
                                        <option value="">Sélectionner un rayon</option>
                                        @foreach ($rayons as $rayon)
                                            <option value="{{ $rayon->id }}" {{ old('rayon_id', $livre->rayon_id) == $rayon->id ? 'selected' : '' }}>{{ $rayon->libelle }}</option>
                                        @endforeach
                                    </select>
                                    @error('rayon_id')
                                        <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-col mb-3">
                                    <label for="categorie_id" class="form-label">Catégorie</label>
                                    <select class="form-control" id="categorie_id" name="categorie_id" >
                                        <option value="">Sélectionner une catégorie</option>
                                        @foreach ($categories as $categorie)
                                            <option value="{{ $categorie->id }}" {{ old('categorie_id', $livre->categorie_id) == $categorie->id ? 'selected' : '' }}>{{ $categorie->libelle }}</option>
                                        @endforeach
                                    </select>
                                    @error('categorie_id')
                                        <div class="error-message">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Soumettre</button>
                    </form>
                </div>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
