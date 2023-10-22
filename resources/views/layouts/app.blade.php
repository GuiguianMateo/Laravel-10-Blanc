<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"crossorigin="anonymous"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <body>
                <div class="container">
                  <nav>
                    <a href="{{ '/' }}">{{ __('Accueil')}}</a> |
                    <a href="{{ route('menu.index') }}">{{ __('Liste des Menus') }}</a> |
                    <a href="{{ route('sousmenu.index') }}">{{ __('Liste des Sous-Menus') }}</a> |
                    <a href="{{ route('page.index') }}">{{ __('Liste des Pages') }}</a>
                    @auth
                    @else
                        || <a href="{{ url('/register') }}">{{ __('Inscription') }}</a> |
                        <a href="{{ url('/login') }}">{{ __('Connexion') }}</a>
                    @endauth

                    <div>
                        @if(app()->getLocale() == 'fr')
                            <a href="{{ route('language.change', 'en') }}">{{--<img src="{{ asset('storage/image/united_kingdom.jpg') }}">--}}{{ __('Changer vers l`Anglais') }}</a>
                        @else
                            <a href="{{ route('language.change', 'fr') }}">{{--<img src="{{ asset('storage/image/france.jpg') }}">--}}{{ __('Change to French') }}</a>
                        @endif
                    </div>
                  </nav>
                  @yield('content')
                </div>
              </body>
        </div>
    </body>
</html>
