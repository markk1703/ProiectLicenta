@if($data->count()>0)
    @foreach($data as $following)
    <div class="media user-following">
        <img src="/uploads/avatars/{{$following->imagine}}" alt="User Avatar" class="media-object pull-left">
        <div class="media-body">
            <a href="{{route('retete.index',['utilizator_id'=>$following->id] )}}">{{$following->nume}} {{$following->prenume}}<br><span class="text-muted username">{{'@'.$following->username}}</span></a>
            <button type="button" class="btn btn-outline-secondary" onclick="processData('#following_show_action','unfollow','{{$following->id}}')">Șterge urmărire</button> 
        </div>
    </div>
    @endforeach
@else
    <div>
        Momentan nu există urmăriri.
    </div>
@endif
