@if($data->count()>0)
@foreach($data as $key=>$follower)
<div class="media user-follower">
    <img src="/uploads/avatars/{{$follower->imagine}}" alt="User Avatar" class="media-object pull-left">
    <div class="media-body">
        <a href="{{route('retete.index',['utilizator_id'=>$follower->id] )}}">{{$follower->nume}}
            {{$follower->prenume}}<br><span
                class="text-muted username">{{'@'.$follower->username}}</span></a>
        <button type="button" class="btn btn-outline-danger"
            onclick="processData('#follower_show_action','remove_follower','{{$follower->id}}')">Șterge urmăritor</button>
    </div>
</div>
@endforeach
@else
<div>
    Momentan nu există urmăritori.
</div>
@endif
