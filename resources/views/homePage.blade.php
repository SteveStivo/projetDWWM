<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.tailwindcss.com"></script>

        <title>Laravel</title>

        <!-- Styles CSS -->
        <link rel="stylesheet" href="../resources/css/app.css">
    </head>
    <body class="antialiased">
        <!-- NAV BAR CONTENT -->
        <div class="navbar-brand">
            @if (Route::has('login'))
                <!-- NAV BAR LOGO -->
                <div class="logo-nav">
                    <img class="img-logo" src="..\public\assets\logo_nav_124x107.png" alt="logo">
                </div>

                <!-- NAV BAR LINK -->
                <nav class="navbar-middle">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="#">Accueil</a></li>
                        <li class="nav-item dropdown">Actualités
                            <ul class="dropdown-menu">
                                <li class="dropdown-item"><a class="dropdown-link" href="#">Evènements</a></li>
                                <li class="dropdown-item"><a class="dropdown-link" href="#">Articles</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#">Artistes</a></li>
                        <li class="nav-item dropdown">TOPS
                            <ul class="dropdown-menu">
                                <li class="dropdown-item"><a class="dropdown-link" href="#">Artistes</a></li>
                                <li class="dropdown-item"><a class="dropdown-link" href="#">Musics</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                    </ul>
                    <!-- NAV BAR SEARCH -->
                    <form class="search-box flex items-center m-2">   
                        <label for="simple-search" class="sr-only">Recherhe</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                            </div>
                            <input type="text" id="simple-search" class="input-search text-sm block w-full pl-10 dark:placeholder-gray-400 dark:text-white" placeholder="Recherche" required>
                        </div>
                        <button type="submit" class="btn-search ml-2 text-sm font-medium border dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            <span class="sr-only">Recherhe</span>
                        </button>
                    </form>
                    <!-- **fin** NAV BAR SEARCH -->
                </nav>
                <!-- **fin** NAV BAR LINK -->

                <!-- NAV BAR LOGIN -->
                <div class="login-content">
                    @auth
                    <a href="{{ url('/dashboard') }}" class="dashboard-button header-connect-button">Tableau de Bord</a>
                    
                    @else
                        <a href="{{ route('login') }}" class="login-button header-connect-button">{{ __('Log in') }}</a>

                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="register-button header-connect-button">{{ __('Register') }}</a>
                        @endif
                    @endauth
                </div>
                <!-- **fin** NAV BAR LOGIN -->
            @endif
        </div>
        <!-- **fin** NAV BAR CONTENT -->
    </body>
</html>
