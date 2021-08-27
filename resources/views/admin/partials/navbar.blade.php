<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand mr-5" @guest href="{{ url('/discover') }}" @endguest @auth href="{{ url('/home') }}"
            @endauth>
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->

            <ul class="navbar-nav mr-auto">
                @auth
                <li class="nav-item mr-5">
                    <a class="nav-link" href="{{route('home.index')}}">Dashboard</a>
                </li>
                @endauth
                <li class="nav-item mr-5">
                    <a class="nav-link" href="{{route('admin.users')}}">Utilizatori</a>
                </li>
                <li class="nav-item mr-5">
                    <a class="nav-link" href="{{route('admin.posts')}}">Postări</a>
                </li>
                <li class="nav-item mr-5">
                    <a class="nav-link" href="{{route('admin.ratings')}}">Rating-uri</a>
                </li>
            </ul>


            <!-- Right Side Of Navbar -->
            <div class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                @else
                <li class="nav-item mr-5">
                    <a class="nav-link" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre
                        style="position:relative;padding-left:50px">
                        <img src="/uploads/avatars/{{Auth::user()->imagine}}"
                            style="width:28px;height:28px;position:absolute;left:10px;border-radius:50%;margin-top:0px;">
                        {{ Auth::user()->nume }} {{ Auth::user()->prenume }}
                    </a>
                </li>
                <li class="nav-item mr-5">
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt mr-1"></i>Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                </li>
                @endguest
            </div>
        </div>
</nav>
