<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Followship;
use App\Models\Notification;
use App\Models\User;
use DB;

class FollowshipController extends Controller
{
    public function index()
    {
        $followers = DB::table('followships')
            ->leftJoin('users', 'followships.user1_id', '=', 'users.id')
            ->where('followships.user2_id',Auth::id())
            ->get();
        $followings = DB::table('followships')
        ->leftJoin('users', 'followships.user2_id', '=', 'users.id')
        ->where('followships.user1_id',Auth::id())
            ->get();
        // $people=User::where('id','!=',Auth::id())->get();
        $notifications=Notification::where('user_id',Auth::id())->get();
        return view('followship.index')->with(compact('followings','followers','notifications'));
    }

    public function checkNotification(){
        $notifications=Notification::where('user_id',Auth::id())->get();
        return response()->json(['data'=>$notifications->count()]);
    }

    public function userAction(Request $request)
    {
        if($request->action=='unfollow'){//unfollow
            if(Followship::where('user1_id',Auth::id())->where('user2_id',$request->user_id)->exists())
            {
                $data=Followship::where('user1_id',Auth::id())->where('user2_id',$request->user_id);
                $data->delete();
                if($request->selector=='#following_show_action'){//unfollow for tab following
                    $data = DB::table('followships')
                ->leftJoin('users', 'followships.user2_id', '=', 'users.id')
                ->where('followships.user1_id',Auth::id())
                ->get();
                return response()->view('followship.partials.following-action',compact('data'));}
            }
            else{
                return response()->json(['data'=>'Sorry, unable to process data'],422);
            }
        }
        else if($request->action=='remove_follower'){//remove follower
            if(Followship::where('user2_id',Auth::id())->where('user1_id',$request->user_id)->exists())
            {
                $data=Followship::where('user2_id',Auth::id())->where('user1_id',$request->user_id);
                $data->delete();
            
                if($request->selector=='#follower_show_action'){
                    $data = DB::table('followships')
                ->leftJoin('users', 'followships.user1_id', '=', 'users.id')
                ->where('followships.user2_id',Auth::id())
                ->get();
                    return response()->view('followship.partials.followers-action',compact('data'));
                }
            }
            else{
                return response()->json(['data'=>'Sorry, unable to process data'],422);
            }
        }
        else if($request->action=='follow'){//follow
            if(Followship::where('user1_id',Auth::id())->where('user2_id',$request->user_id)->exists())
            return response()->json(['data'=>'Sorry, unable to perform action'],422);
            else{
            $notify=Notification::create([
                'user_id'=>$request->user_id,
                'titlu'=>'Ai un nou urmaritor',
                'denumire'=>'Ai un nou urmaritor'
            ]);

            Followship::create([
                'user1_id'=>Auth::id(),
                'user2_id' => $request->user_id
            ]);
            if($request->selector=='#following_show_action'){//follow for tab following
                $data = DB::table('followships')
                ->leftJoin('users', 'followships.user2_id', '=', 'users.id')
                ->where('followships.user1_id',Auth::id())
                ->get();
                return response()->view('followship.partials.following-action',compact('data'));
            }  
            else{
                return response()->json(['data'=>'Sorry, unable to perform action'],422);
            }
            }
        }
        else if($request->action=='reload_people'){
            $term=$request->term;
            $data=User::where('id','!=',Auth::id())->where('username','LIKE','%'.$term.'%')->get();
            return response()->view('followship.partials.people-action',compact('data'));
        }
    }
    public function reloadFollowers()
    {
        $data=Followship::where('user2_id',Auth::id())->get();
        return response()->view('followship.partials.followers-action',compact('data'));
    }
   
    public function search(Request $request)
    {
        $term=$request->term;
        $data=DB::table('users')->where('id','!=',Auth::id())->where('username','LIKE','%'.$term.'%')->get();
        return response()->view('followship.partials.people-search',compact('data','term'));
    }
}
