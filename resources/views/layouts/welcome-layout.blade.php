<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('inc.head')
    <link href="{{ asset('css/loader-welcome.css') }}" rel="stylesheet">
    @yield('hd')
</head>
@include('inc.navbar')

<body>
    <div id="app">
    <div id="page-container">
        <div id="wrapper">          
            <button class="scrollToTop" id="scrollToTop"><i class="fas fa-arrow-up" id="scrollup-arrow"></i></button></a>
            @include('inc.loader')
            @yield('content')
        </div>
    </div>
    </div>
</body>
<script src="{{asset('js/loader.js')}}"></script>
<script src="{{asset('js/navbar-sticky.js')}}"></script>
<script src="{{asset('js/scrollup.js')}}"></script>

</html>
