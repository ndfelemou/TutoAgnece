<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Bootstrap - Icons links --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/main.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@300..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet"> --}}

    {{-- Tom select --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/tom-select@2.4.3/dist/css/tom-select.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.4.3/dist/js/tom-select.complete.min.js"></script> --}}

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>@yield('title') | Administration</title>
</head>

<body>
    <!-- Barre de navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="/"><strong>Agence</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            @php
                $route = request()->route()->getName();
            @endphp

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    {{-- Liens de navitation --}}
                    <li class="nav-item">
                        <a @class(['nav-link', 'active' => str_contains($route, 'property.')]) aria-current="page"
                            href="{{ route('admin.property.index') }}">Gérer les biens
                        </a>
                    </li>

                    <li class="nav-item">
                        <a @class(['nav-link', 'active' => str_contains($route, 'option.')]) aria-current="page"
                            href="{{ route('admin.option.index') }}">Gérer les options
                        </a>
                    </li>
                </ul>

                <div class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        @auth
                            <li class="nav-item">
                                <span class="nav-link active">{{ Auth::user()->name }}</span>
                            </li>

                            <form action="{{ route('logout') }}" method="post" class="nav-item">
                                @method('delete')
                                @csrf

                                <button type="submit" class="btn btn-sm btn-danger">Se deconnecer</button>
                            </form>
                        @endauth

                        @guest
                            <li class="nav-item">
                                <a class="btn btn-sm btn-dark" href="{{ route('register') }}">S'inscrire </a>
                            </li>

                            <li class="nav-item">
                                <a class="btn btn-sm btn-success " href="{{ route('login') }}" style="margin-left: 5px">Se
                                    connecter</a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        @include('shared.flash')

        @yield('content')
    </div>

    {{-- Bootstrap scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    {{--
    <script>
        new TomSelect('select[multiple]', {
            plugins: remove_button = {
                title: 'Supprimer'
            }
        });
    </script> --}}
</body>

</html>
