<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Fonts/Styles -->
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/> --}}
    <link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/messages.css') }}" rel="stylesheet">
    <link href="{{ asset('css/cover.css') }}" rel="stylesheet">
    <link href="{{ asset('css/profile-accordion.css') }}" rel="stylesheet">
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/galery-section.css') }}" rel="stylesheet">
    <link href="{{ asset('css/scrollup.css') }}" rel="stylesheet">
    <link href="{{ asset('css/notiflix-2.7.0.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/carousel-slide.css') }}" rel="stylesheet">
    <link href="{{ asset('css/rating.css') }}" rel="stylesheet">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CoreUI CSS -->
    <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css" crossorigin="anonymous">

    <title>Modul Administrator</title>
</head>

<body class="c-app">
    <div class="c-wrapper">
        <div class="c-body">
            @include('admin.partials.navbar')
            @include('inc.messages')  
            <main class="c-main">
                <div class="container-fluid">
                    <button class="scrollToTop" id="scrollToTop"><i class="fas fa-arrow-up" id="scrollup-arrow"></i></button></a>
                    @yield('content')
                </div>
            </main>
        </div>
        {{-- <footer class="c-footer">
            <div><a href="https://coreui.io">CoreUI</a> © 2020 creativeLabs.</div>
            <div class="mfs-auto">Powered by&nbsp;<a href="https://coreui.io/pro/">CoreUI Pro</a></div>
        </footer> --}}
    </div>

    <!-- Optional JavaScript -->
    <!-- Popper.js first, then CoreUI JS -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.min.js"></script>
    <script src="{{asset('js/scrollup.js')}}"></script>
</body>

</html>
