<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Followship;
use App\Models\User;
use DB;

class FollowshipController extends Controller
{
    public function index(Request $request)
    {
        $followers = DB::table('followships')
            ->leftJoin('users', 'followships.user1_id', '=', 'users.id')
            ->where('followships.user2_id',$request->utilizator_id)
            ->get();
        $followings = DB::table('followships')
        ->leftJoin('users', 'followships.user2_id', '=', 'users.id')
        ->where('followships.user1_id',$request->utilizator_id)
            ->get();
        return view('followship.index')->with(compact('followings'))->with(compact('followers'));
    }
    public function follow(Request $request)
    {

    }
    public function unfollow(Request $request)
    {

    }
    public function search(Request $request)
    {
        $followers = DB::table('followships')
            ->leftJoin('users', 'followships.user1_id', '=', 'users.id')
            ->where('followships.user2_id',$request->utilizator_id)
            ->get();
        $followings = DB::table('followships')
        ->leftJoin('users', 'followships.user2_id', '=', 'users.id')
        ->where('followships.user1_id',$request->utilizator_id)
            ->get();

        $term=$request->term;
        $users=DB::table('users')->where('username','LIKE','%'.$term.'%')->get();
        return response($users);
    }
}
