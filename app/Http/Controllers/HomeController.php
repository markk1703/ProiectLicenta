<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reteta;
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
        $retete = DB::table('retete')
            ->join('followships', 'retete.utilizator_id', '=', 'followships.user2_id')
            ->join('users', 'users.id', '=', 'retete.utilizator_id')
            ->where('followships.user1_id',Auth::id())
            ->select('users.*', 'retete.*')->get();

        return view('home.index',compact('retete'));
    }

    public function dashboard(Request $request)
    {
        return view('dashboard.index');
    }
}
