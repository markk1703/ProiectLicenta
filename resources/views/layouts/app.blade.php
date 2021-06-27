<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('inc.head')
    <link href="{{ asset('css/loader.css') }}" rel="stylesheet">
    @yield('hd')
</head>
<body>
    <div id="app">
    <div id="page-container">
        <div id="wrapper"> 
            @include('inc.navbar')
            @include('inc.messages')         
            @include('inc.loader')
            <button class="scrollToTop" id="scrollToTop"><i class="fas fa-arrow-up" id="scrollup-arrow"></i></button></a>
            @yield('content')
        </div>
    </div>
    </div>
@include('inc.footer')
@yield('scripts')
</body>
<script src="{{asset('js/loader.js')}}"></script>
<script src="{{asset('js/notiflix-2.7.0.min.js')}}"></script>
<script src="{{asset('js/navbar-sticky.js')}}"></script>
<script src="{{asset('js/scrollup.js')}}"></script>
<script>function checkNotification() {
    let status = false;
    let notification = $('#notificationCount').val();
    setInterval(function () {
        axios.get("{{route('followship.checkNotification')}}", {
            params: {
                count: notification,
            }
        }).then(data => {
            if (data.data.count != notification) {
                $('#notificationCount').val(data.data.count);
                if (status == false) {
                    status = true;
                    reloadNotifications("#notifications_show_action");
                }

            }
        }).catch(error => {
            console.log(error);
        })
    }, 8000);
}

function reloadNotifications(selector) {
    setInterval(function () {
        axios.get("{{route('followship.reloadNotifications')}}", {
            params: {}
        }).then(data => {
            $(selector).html(data.data);
        }).catch(error => {
            console.log(error);
        })
    }, 8000);
}
checkNotification();</script>
</html>
