<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reteta;
use App\Notifications\NewRating;
use App\Models\User;
use DB;
use AppRating;

class RatingController extends Controller
{
    public function postStar (Request $request,$id) {
        $reteta=Reteta::find($id);
        $reteta->rateOnce($request->input('star'));
        $reteta->rating_avg=$reteta->averageRating();
        $reteta->save();
        User::find($reteta->utilizator_id)->notify(new NewRating(User::findOrFail(Auth::id()),$reteta,$request->star));
        return redirect()->back();
  }
  public function deleteStar($id){
    DB::table('ratings')->where('rateable_id',$id)->where('user_id',Auth::id())->delete();
    return redirect()->back();
  }
}
