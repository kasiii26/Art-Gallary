<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Art Gallary') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
  

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm w-100" style="position: fixed; top: 0; z-index: 1030; width: 100%;">         <a class="navbar-brand" href="{{ route('home') }}">   <img src="assets/images/logo.png.png"  style="height: 60px;">
                    <!-- {{ config('app.name', 'Art Gallary') }} -->
                </a>
                <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-5 my-2 my-md-0 mw- navbar-search">
                        <div class="input-group" style="width: 160%;">
                        <input type="text" class="form-control bg-light border-0 large" placeholder="Search for..."
                            aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                            <svg fill="#000000" width="20px" height="20px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
<title>magnifier</title>
<path d="M29.156 29.961l-0.709 0.709c-0.785 0.784-2.055 0.784-2.838 0l-5.676-5.674c-0.656-0.658-0.729-1.644-0.281-2.412l-3.104-3.102c-1.669 1.238-3.728 1.979-5.965 1.979-5.54 0-10.031-4.491-10.031-10.031s4.491-10.032 10.031-10.032c5.541 0 10.031 4.491 10.031 10.032 0 2.579-0.98 4.923-2.58 6.7l3.035 3.035c0.768-0.447 1.754-0.375 2.41 0.283l5.676 5.674c0.784 0.785 0.784 2.056 0.001 2.839zM18.088 11.389c0-4.155-3.369-7.523-7.524-7.523s-7.524 3.367-7.524 7.523 3.368 7.523 7.523 7.523 7.525-3.368 7.525-7.523z"></path>
</svg>
                            </button>
                        </div>
                    </div>
                    </form>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        
                        <!-- Authentication Links -->
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
                        <a id="categoryDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ __('Categories') }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="categoryDropdown">
                            <a class="dropdown-item" href="{{ route('category', ['id' => 1]) }}">{{ __('Contemporary Art') }}</a>
                            <a class="dropdown-item" href="{{ route('category', ['id' => 2]) }}">{{ __('Modern Art') }}</a>
                            <a class="dropdown-item" href="{{ route('category', ['id' => 3]) }}">{{ __('Classical Art') }}</a>
                            <a class="dropdown-item" href="{{ route('category', ['id' => 1]) }}">{{ __('Renaissance Art') }}</a>
                            <a class="dropdown-item" href="{{ route('category', ['id' => 2]) }}">{{ __('Baroque Art') }}</a>
                            <a class="dropdown-item" href="{{ route('category', ['id' => 3]) }}">{{ __('Romanticism') }}</a>
                            <a class="dropdown-item" href="{{ route('category', ['id' => 1]) }}">{{ __('Abstract Art') }}</a>
                            <a class="dropdown-item" href="{{ route('category', ['id' => 2]) }}">{{ __('Impressionism') }}</a>
                            <a class="dropdown-item" href="{{ route('category', ['id' => 3]) }}">{{ __('Expressionism') }}</a>
                            <a class="dropdown-item" href="{{ route('category', ['id' => 1]) }}">{{ __('Surrealism') }}</a>
                            <a class="dropdown-item" href="{{ route('category', ['id' => 2]) }}">{{ __('Pop Art') }}</a>
                            <a class="dropdown-item" href="{{ route('category', ['id' => 3]) }}">{{ __('Folk Art') }}</a>
                            <a class="dropdown-item" href="{{ route('category', ['id' => 1]) }}">{{ __('Digital Art') }}</a>
                            <a class="dropdown-item" href="{{ route('category', ['id' => 2]) }}">{{ __('Performance Art') }}</a>
                            <a class="dropdown-item" href="{{ route('category', ['id' => 3]) }}">{{ __('Street Art and Graffiti') }}</a>
                        </div>
                    </li>
                        
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} 
                                <span class="badge {{ Auth::user()->role === 1 ? 'bg-primary' : 'bg-secondary' }}">
                                    {{ Auth::user()->role === 1 ? 'Admin' : 'User' }}
                                </span>
                            </a>
                            
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <!-- <main class="py-4"> -->
            @yield('content')
            
        <!-- </main> -->
    </div>
</body>
</html>
