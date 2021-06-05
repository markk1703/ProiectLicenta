<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reteta;
use App\Models\User;
use App\Models\Rating;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {//trebuie revizuit!
        // $retete = DB::table('retete')
        //     ->join('followships', 'retete.utilizator_id', '=', 'followships.user2_id')
        //     ->join('users', 'users.id', '=', 'retete.utilizator_id')
        //     ->where('followships.user1_id',Auth::id())
        //     ->select('users.*', 'retete.*')->get();
        if(Auth::user()->rol_id==2){
        $retete=Reteta::where('utilizator_id','!=',Auth::id())->latest()->get();
        return view('home.index',compact('retete'));}
        else if(Auth::user()->rol_id==1){
            $utilizatori=User::all()->count();
            $retete=Reteta::all()->count();
            $ratings=Rating::all()->count();
            return view('admin.dashboard.index',compact(['utilizatori','retete','ratings']));
        }
    }

    public function dashboard(Request $request)
    {
        return view('dashboard.index');
    }
}
