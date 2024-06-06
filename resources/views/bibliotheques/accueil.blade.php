<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{ route('creation')}}">nouveau</a>

    @foreach ($livres as $livre)
    <div class="card " style="width: 18rem;">
        <img src="{{ $livre->image }}" height="300px" class="card-img-top" alt="...">
        <div class="card-body">
            <h1 name="titre">{{ $livre->titre }}</h1>   
            <p name="auteur">{{ $livre->auteur }}</p>
            <a href="{{ route('detail', $livre->id)}}">details</a>
            <a href="{{ route('modifier', $livre->id) }}" class="btn btn-warning">Modifier</a>
            <a href="{{ route('supprimer', $livre->id) }}" class="btn btn-warning">supprimer</a>

        </div>
      </div>
    @endforeach
</body>
</html>