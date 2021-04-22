    <input id="notificationCount" value=0 hidden>
    <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        Notificări
        @if(Auth::user()->unreadNotifications->count()>0)
        <span id="notificationsNr" class="badge"
            style="background-color:red">{{Auth::user()->unreadNotifications->count()}}</span>
        @endif
    </a>

    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        @if(Auth::user()->unreadNotifications->count()==0)
        <div class="dropdown-item text-center" href="">Nu aveți notificări noi.</div>

        @elseif(Auth::user()->unreadNotifications->count()>0)
        <div class="dropdown-item text-center">
            <a class="btn btn-success btn-sm" href={{route('followship.markAsRead')}}>Marchează ca citite.</a></div>
        @endif

        @foreach(Auth::user()->unreadNotifications as $notification)
        <div class="dropdown-item"><a
                href="{{route('retete.index',['utilizator_id'=>$notification->data['user_id']] )}}">{{$notification->data['user_name']}}</a>
            a început să te urmărească.
            <br>
            <small>{{$notification->created_at->diffForHumans()}}</small>
        </div>

        <hr>
        @endforeach
    </div>