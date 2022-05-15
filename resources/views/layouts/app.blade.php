<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    @yield('css')
</head>
<body>
<div id="app">
    <h1 class="d-none">  {{$user=\Illuminate\Support\Facades\Auth::user()}} </h1>
    @if($user)
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <!-- Brand -->
            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('setting.create')}}">setting</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('slider.create')}}">slider</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('about.create')}}">about</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('gallery.create')}}">gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('contact.index')}}">contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('show')}}" target="_blank">show_website</a>
                    </li>
                    <li class="nav-item">
                        <a class="dropdown-item text-white bg-info" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
    @endif
    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>
