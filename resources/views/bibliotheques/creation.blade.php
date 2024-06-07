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
            color: #fff;
            padding: 20px;
            position: fixed;
            height: 100%;
        }
        .sidebar .nav-link {
            color: #fff;
            margin-bottom: 15px;
        }
        .sidebar .nav-link.active {
            background-color: #ff009d;
            color: #fff;
        }
        .main-content {
            margin-left: 270px;
            padding: 20px;
            flex: 1;
        }
        .container {
            margin-top: 50px;
        }
        .form-label {
            font-weight: bold;
        }
        .btn-primary {
            background-color: #ff009d;
            border-color: #ff009d;
        }
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .card-header {
            background-color: #ff009d;
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
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Biblioline</h2>
        <nav class="nav flex-column">
            <a class="nav-link" href="{{ route('accueil') }}">Accueil</a>
            <a class="nav-link" href="{{ route('livres') }}">Livres</a>
            <a class="nav-link active" href="{{ route('creation') }}">Nouveau</a>
            <a class="nav-link" href="{{ route('index') }}">Categories</a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h2>Ajouter un Livre</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('sauvegarde') }}" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="form-col mb-3">
                                <label for="titre" class="form-label">Titre</label>
                                <input type="text" class="form-control" id="titre" name="titre" required>
                            </div>
                            <div class="form-col mb-3">
                                <label for="auteur" class="form-label">Auteur</label>
                                <input type="text" class="form-control" id="auteur" name="auteur" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-col mb-3">
                                <label for="nombre_de_pages" class="form-label">Nombre de Pages</label>
                                <input type="number" class="form-control" id="nombre_de_pages" name="nombre_de_pages" required>
                            </div>
                            <div class="form-col mb-3">
                                <label for="date_de_publication" class="form-label">Date de Publication</label>
                                <input type="date" class="form-control" id="date_de_publication" name="date_de_publication" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-col mb-3">
                                <label for="editeur" class="form-label">Éditeur</label>
                                <input type="text" class="form-control" id="editeur" name="editeur" required>
                            </div>
                            <div class="form-col mb-3">
                                <label for="isbn" class="form-label">ISBN</label>
                                <input type="text" class="form-control" id="isbn" name="isbn" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-col mb-3">
                                <label for="rayon_id" class="form-label">Rayon</label>
                                <select class="form-control" id="rayon_id" name="rayon_id" required>
                                    <option value="">Sélectionner un rayon</option>
                                    @foreach ($rayons as $rayon)
                                        <option value="{{ $rayon->id }}">{{ $rayon->libelle }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-col mb-3">
                                <label for="categorie_id" class="form-label">Catégorie</label>
                                <select class="form-control" id="categorie_id" name="categorie_id" required>
                                    <option value="">Sélectionner une catégorie</option>
                                    @foreach ($categories as $categorie)
                                        <option value="{{ $categorie->id }}">{{ $categorie->libelle }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-col mb-3">
                                <label for="image" class="form-label">Image (URL)</label>
                                <input type="url" class="form-control" id="image" name="image" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Soumettre</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
