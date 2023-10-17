<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>


  <title>@yield('title', 'CMS-Gestion')</title>
</head>

<body>
    @include('layouts.navigation')
  <div class="container">
    <nav>
      <a href="{{ '/' }}">Accueil</a>
      <a href="{{ route('menu.index') }}">Listes des Menus</a>
      <a href="{{ route('sousmenu.index') }}">Listes des Sous-Menus</a>
      <a href="{{ route('page.index') }}">Listes des Pages</a>

        @auth
            <a href="{{ url('/logout') }}">Déconnexion</a>
        @else
            <a href="{{ url('/register') }}">Inscription</a>
            <a href="{{ url('/login') }}">Connexion</a>
        @endauth

    </nav>
    @yield('content')
  </div>
</body>

</html>
