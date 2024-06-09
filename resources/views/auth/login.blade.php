<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      .form-container {
          max-width: 500px;
          margin: auto;
          margin-top: 50px;
          padding: 20px;
          background: #f8f9fa;
          border-radius: 10px;
          box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      }
      .btn-primary {
            background-color: #BF4D19;
            border-color: #BF4D19;
        }
  </style>
  </head>
  <body>
    <div class="container mt-5">
      <div class="form-container">

      <h1 class="text-center">Se connecter</h1>
      <form action="{{ route('login.store') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
          @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Mot de passe</label>
          <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
          @error('password')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary">Connexion</button>
        <a href="{{ route('register') }}" class="btn btn-light">S'inscrire</a>
      </div>
      </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
