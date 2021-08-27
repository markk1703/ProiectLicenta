<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reteta;
use App\Models\User;
use App\Models\Rating;
use App\Charts\FreshDataChart;
use App\Charts\TotalDataChart;
use Carbon\Carbon;
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
    {
        if(Auth::user()){
        if(Auth::user()->rol_id==2){
        $retete = Reteta::where('utilizator_id','!=',Auth::id())
            ->join('followships', 'retete.utilizator_id', '=', 'followships.user2_id')
            ->join('users', 'users.id', '=', 'retete.utilizator_id')
            ->where('followships.user1_id',Auth::id())
            ->select('users.*', 'retete.*')->paginate(5);;
        return view('home.index',compact('retete'));}
        else if(Auth::user()->rol_id==1){
            $utilizatori=User::all()->count();
            $retete=Reteta::all()->count();
            $ratings=Rating::all()->count();
            $users = collect([]); // Could also be an array
            $users_total = collect([]); 

            $recipes = collect([]);
            $recipes_total = collect([]); 
            $reviews = collect([]); 
            $reviews_total = collect([]); 
            $days = collect([]); 

            //Date noi
for ($days_backwards = 13; $days_backwards >= 0; $days_backwards--) {
    // Could also be an array_push if using an array rather than a collection.
    $users->push(User::whereDate('created_at', today()->subDays($days_backwards))->count());
    $recipes->push(Reteta::whereDate('created_at', today()->subDays($days_backwards))->count());
    $reviews->push(Rating::whereDate('created_at', today()->subDays($days_backwards))->count());
    $days->push(\Carbon\Carbon::today()->subDays($days_backwards)->toDateString());
}

            //Date totale
$days_backwards=13;
$users_before=User::whereDate('created_at','<',today()->subDays($days_backwards))->count();
$recipes_before=Reteta::whereDate('created_at','<',today()->subDays($days_backwards))->count();
$reviews_before=Rating::whereDate('created_at','<',today()->subDays($days_backwards))->count();
for ($days_backwards = 13; $days_backwards >= 0; $days_backwards--) {
    if($days_backwards == 13)
    {    $users_total->push($users_before+User::whereDate('created_at', today()->subDays($days_backwards))->count());
         $recipes_total->push($recipes_before+Reteta::whereDate('created_at', today()->subDays($days_backwards))->count());
         $reviews_total->push($reviews_before+Rating::whereDate('created_at', today()->subDays($days_backwards))->count());

    }else{
    $users_total->push($users_total->last()+User::whereDate('created_at', today()->subDays($days_backwards))->count());
    $recipes_total->push($recipes_total->last()+Reteta::whereDate('created_at', today()->subDays($days_backwards))->count());
    $reviews_total->push($reviews_total->last()+Rating::whereDate('created_at', today()->subDays($days_backwards))->count());
    }
}

$fresh_chart=new FreshDataChart();
$fresh_chart->labels($days);
$fresh_chart->dataset('Utilizatori noi', 'line', $users)->color('darkblue');
$fresh_chart->dataset('Rețete noi', 'line', $recipes)->color('green');
$fresh_chart->dataset('Rating-uri noi', 'line', $reviews)->color('orange');

$total_chart=new TotalDataChart;
$total_chart->labels($days);
$total_chart->dataset('Total utilizatori', 'line', $users_total)->color('darkblue');
$total_chart->dataset('Total rețete', 'line', $recipes_total)->color('green');
$total_chart->dataset('Total rating-uri', 'line', $reviews_total)->color('orange');

            return view('admin.dashboard.index',compact(['utilizatori','retete','ratings','fresh_chart','total_chart']));
        }
    }else return back();
    }

    public function dashboard(Request $request)
    {
        return view('dashboard.index');
    }
}
