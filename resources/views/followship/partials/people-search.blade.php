        @if($data->count()>0)
        @foreach($data as $key=>$pers)
        <div class="media user-people">
            <img src="/uploads/avatars/{{$pers->imagine}}" alt="User Avatar" class="media-object pull-left">
            <div class="media-body">
                <a href="{{route('retete.index',['utilizator_id'=>$pers->id] )}}">{{$pers->nume}}
                    {{$pers->prenume}}<br><span class="text-muted username">{{'@'.$pers->username}}</span></a>
                @if(isFollowing($pers->id)=='following')
                <button type="button" class="btn btn-outline-secondary"
                    onclick="processData('#following_show_action','unfollow','{{$pers->id}}')">Șterge urmărire</button>
                @elseif(isFollowing($pers->id)=='follower')
                <button type="button" class="btn btn-info"
                    onclick="processData('#following_show_action','follow','{{$pers->id}}')">Urmărește și tu</button>
                @else
                <button type="button" class="btn btn-primary"
                    onclick="processData('#following_show_action','follow','{{$pers->id}}')"> Urmărește</button>
                @endif
            </div>
        </div>
        @endforeach
        @else
        <div>
            Nimic de afișat.
        </div>
        @endif 
