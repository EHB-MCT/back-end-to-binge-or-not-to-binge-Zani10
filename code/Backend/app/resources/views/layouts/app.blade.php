<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Makeflix</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/light-theme.css') }}" id="theme-style">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        body {
            padding-top: 70px;
        }

        .profile-photo-nav {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            object-fit: cover;
        }

        .footer {

            color: #f8f9fa;
            padding: 20px 0;
        }

        .footer a {
            color: #f8f9fa;
        }

        .nav-item {
            display: flex;
            align-items: center;
        }

        .navbar-toggler {
            color:  #1a202c;
        }

        #theme-switcher {
        background-color: #1a202c;
            border: thin solid rgba(255, 255, 255, 0.15);
        }
    </style>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                Makeflix
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                @if(Auth::user()->profile_photo)
                                    <img src="{{ Auth::user()->profile_photo }}" alt="Profile Photo" class="profile-photo-nav mr-2">
                                @endif
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('profile.show', Auth::user()->id) }}">
                                    {{ __('Profile') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                    <li class="nav-item">
                        <button id="theme-switcher" class="btn btn-secondary">
                            <i id="theme-icon" class="fas fa-moon"></i>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>

    @if (!in_array(Route::currentRouteName(), ['login', 'register']))
        <footer class="footer text-center">
            <div class="container">
                <p class="mb-0">© 2024 Makeflix. All rights reserved.</p>
                <p>
                    <a href="{{ url('/') }}">Home</a> |
                    @auth
                        <a href="{{ route('profile.show', Auth::user()->id) }}">Profile</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                    @endauth
                </p>
            </div>
        </footer>
    @endif
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const themeSwitcher = document.getElementById('theme-switcher');
        const themeStyle = document.getElementById('theme-style');
        const themeIcon = document.getElementById('theme-icon');

        themeSwitcher.addEventListener('click', function() {
            const currentTheme = themeStyle.getAttribute('href');
            const newTheme = currentTheme.includes('light-theme.css') ? 'dark-theme.css' : 'light-theme.css';
            themeStyle.setAttribute('href', `{{ asset('css') }}/${newTheme}`);
            localStorage.setItem('theme', newTheme);
            themeIcon.className = newTheme.includes('light-theme.css') ? 'fas fa-moon' : 'fas fa-sun';
        });

        const savedTheme = localStorage.getItem('theme');
        if (savedTheme) {
            themeStyle.setAttribute('href', `{{ asset('css') }}/${savedTheme}`);
            themeIcon.className = savedTheme.includes('light-theme.css') ? 'fas fa-moon' : 'fas fa-sun';
        }
    });
</script>
</body>
</html>
