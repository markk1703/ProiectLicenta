<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reteta;
use App\Models\Rating;
use AppRating;

class RatingController extends Controller
{
    public function postStar (Request $request,$id) {
        $reteta=Reteta::find($id);
        $reteta->rateOnce($request->input('star'));
        $reteta->rating_avg=$reteta->averageRating();
        $reteta->save();
        return redirect()->back();
  }
}
