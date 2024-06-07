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
                <input type="text" class="form-control" id="titre" name="titre" required value="{{ $livre->titre }}">
              </div>
              <div class="form-col mb-3">
                <label for="auteur" class="form-label">Auteur</label>
                <input type="text" class="form-control" id="auteur" name="auteur" required value="{{ $livre->auteur }}">
              </div>
            </div>
            <div class="form-row">
              <div class="form-col mb-3">
                <label for="image" class="form-label">Image (URL)</label>
                <input type="url" class="form-control" id="image" name="image" required value="{{ $livre->image }}">
              </div>
              <div class="form-col mb-3">
                <label for="date_de_publication" class="form-label">Date de Publication</label>
                <input type="date" class="form-control" id="date_de_publication" name="date_de_publication" required value="{{ $livre->date_de_publication }}">
              </div>
            </div>
            <div class="form-row">
              <div class="form-col mb-3">
                <label for="nombre_de_pages" class="form-label">Nombre de Pages</label>
                <input type="number" class="form-control" id="nombre_de_pages" name="nombre_de_pages" required value="{{ $livre->nombre_de_pages }}">
              </div>
              <div class="form-col mb-3">
                <label for="isbn" class="form-label">ISBN</label>
                <input type="number" class="form-control" id="isbn" name="isbn" required value="{{ $livre->isbn }}">
              </div>
            </div>
            <div class="form-row">
              <div class="form-col mb-3">
                <label for="editeur" class="form-label">Éditeur</label>
                <input type="text" class="form-control" id="editeur" name="editeur" required value="{{ $livre->editeur }}">
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
            </div>
            <button type="submit" class="btn btn-primary">Soumettre</button>
          </form>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
