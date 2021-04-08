<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('inc.head')
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand mr-5" @guest href="{{ url('/discover') }}" @endguest @auth href="{{ url('/home') }}" @endauth>
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                    <ul class="navbar-nav mr-auto">
                        @auth
                        <li class="nav-item mr-5">
                            <a class="nav-link" href="/home">Home</a>
                        </li>
                        @endauth
                        <li class="nav-item mr-5">
                            <a class="nav-link" href="{{route('retete.discover')}}">Descoperă</a>
                        </li>
                        <li class="nav-item mr-5">
                            <a class="nav-link" href="{{route('search.index')}}">Caută rețete</a>
                        </li>
                        @auth
                        <li class="nav-item dropdown mr-5">
                            <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Rețete
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('retete.create')}}">Adaugă rețetă</a>
                                <a class="dropdown-item" href="{{route('retete.index',['utilizator_id'=>Auth::id()])}}">Rețetele mele</a>
                                <a class="dropdown-item" href="{{route('retete.index')}}">Vezi rețete</a>
                            </div>
                        </li>
                        @endauth
                        <li class="nav-item dropdown mr-5">
                            <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Nutriție
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('nutritie.scan')}}">Calculator valori nutritionale</a>
                                <a class="dropdown-item" href="#">Caută produs</a>
                            </div>
                        </li>
                        @auth
                        <li class="nav-item dropdown mr-5">
                            <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Altele
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('followship.index',['utilizator_id'=>Auth::id()])}}">Lista de urmariri</a>
                                <a class="dropdown-item" href="{{route('home.dashboard',['utilizator_id'=>Auth::id()])}}">Dashboard</a>
                            </div>
                        </li>
                        @endauth
                    </ul>


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Înregistrare') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre
                                style="position:relative;padding-left:50px">
                                <img src="/uploads/avatars/{{Auth::user()->imagine}}"
                                    style="width:28px;height:28px;position:absolute;left:10px;border-radius:50%;margin-top:0px;">
                                {{ Auth::user()->nume }} {{ Auth::user()->prenume }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/profile">Profil</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="py-4">
            @include('inc.messages')
        </div>
    </div>
    @yield('content')
</body>
</html>
