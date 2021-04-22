<?php
use App\Models\Followship;
use App\Models\Rating;
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

function hasRated($user_id,$rateable_id)
{$rating=Rating::where('user_id',$user_id)->where('rateable_id',$rateable_id);
    if($rating->exists())
    {
   $rating=$rating->get()[0];
    return $rating;}
    else{
        return 'not_rated';
    }
}