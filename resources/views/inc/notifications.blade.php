<li class="nav-item dropdown mr-5" id="notifications_show_action">
    <input id="notificationCount" value=0 hidden>
    @if(Auth::user()->unreadNotifications->count()==0)
    <a class="nav-link dropdown far fa-bell" href="" id="navbarDropdown" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        @if(Auth::user()->unreadNotifications->count()>0)
        <span id="notificationsNr" class="badge ml-2"
            style="background-color:red">{{Auth::user()->unreadNotifications->count()}}</span>
        @endif
    </a>
    @else
    <a class="nav-link dropdown fas fa-bell" href="" id="navbarDropdown" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        @if(Auth::user()->unreadNotifications->count()>0)
        <span id="notificationsNr" class="badge ml-2"
            style="background-color:red">{{Auth::user()->unreadNotifications->count()}}</span>
        @endif
    </a>
    @endif

    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        @if(Auth::user()->unreadNotifications->count()==0)
        <div class="dropdown-item text-center" href="">Nu aveți notificări noi.</div>

        @elseif(Auth::user()->unreadNotifications->count()>0)
        <div class="dropdown-item text-center">
            <a class="btn btn-success btn-sm" href={{route('followship.markAsRead')}}>Marchează ca citite.</a></div>
        @endif

        @foreach(Auth::user()->unreadNotifications as $notification)
        @if($notification->type==="App\Notifications\NewFollower")
        <div class="dropdown-item"><a
                href="{{route('retete.index',['utilizator_id'=>$notification->data['user_id']] )}}">{{$notification->data['user_name']}}</a>
            a început să te urmărească.
            <br>
            <small>{{$notification->created_at->diffForHumans()}}</small>
        </div>
        <hr>
        @elseif($notification->type==="App\Notifications\NewRating")
        <div class="dropdown-item"><a
                href="{{route('retete.index',['utilizator_id'=>$notification->data['user_id']] )}}">{{$notification->data['user_name']}}</a>
            a acordat {{$notification->data['stars']}} stele pentru <a
                href="{{route('retete.show',findReteta($notification->data['reteta_id'])->id)}}">
                "{{findReteta($notification->data['reteta_id'])->denumire}}"</a>
            <br>
            <small>{{$notification->created_at->diffForHumans()}}</small>
        </div>
        <hr>
        @endif
        @endforeach
    </div>
</li>
