<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('inc.head')
    @yield('hd')
</head>
@include('inc.navbar')

<body>
    <div id="app">
    <div id="page-container">
        <div id="wrapper">          
            <button class="scrollToTop" id="scrollToTop"><i class="fas fa-arrow-up" id="scrollup-arrow"></i></button></a>
            @yield('content')
        </div>
    </div>
    </div>
</body>
<script src="{{asset('js/navbar-sticky.js')}}"></script>
<script src="{{asset('js/scrollup.js')}}"></script>

</html>
