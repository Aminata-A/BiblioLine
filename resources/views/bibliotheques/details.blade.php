<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="card " style="width: 18rem;">
        <img src="{{ $livre->image }}" height="300px" class="card-img-top" alt="...">
        <div class="card-body">
            <h1 name="titre">{{ $livre->titre }}</h1>   
            <p name="date_de_publication">{{ $livre->date_de_publication }}</p>
            <p name="nombre_de_pages">{{ $livre->nombre_de_pages }}</p>
            <p name="auteur">{{ $livre->auteur }}</p>
            <p name="isbn">{{ $livre->isbn }}</p>
            <p name="editeur">{{ $livre->editeur }}</p>
            <p name="id_categorie">{{ $livre->categorie_id }}</p>
            <p name="id_rayon">Rayon: {{ $livre->rayon_id }}</p>
        </div>
      </div>
</body>
</html>