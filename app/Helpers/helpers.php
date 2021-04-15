<?php
use App\Models\Followship;
function isFollowing($id)
{
    if(Followship::where('user2_id',$id)->where('user1_id',Auth::user()->id)->exists())
    return 'following';
    elseif(Followship::where('user1_id',$id)->where('user2_id',Auth::user()->id)->exists()){
        return 'follower';
    }
    else{
        return 'none';
    }
}