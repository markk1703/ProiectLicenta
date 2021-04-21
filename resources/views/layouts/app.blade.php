<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('inc.head')
    @yield('hd')
    
</head>

<body class='mb-5'>
    <div id="app">
        @include('inc.navbar')
        @include('inc.messages')
    </div>
    @yield('content')
</body>
<script src="{{asset('js/notiflix-2.7.0.min.js')}}"></script>
</html>
