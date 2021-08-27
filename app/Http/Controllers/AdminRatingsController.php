<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;

class AdminRatingsController extends Controller
{
    public function index(){
        $ratings=Rating::latest()->paginate(12);
        return view('admin.ratings.index',compact('ratings'));
    }
    public function destroy($id){
        $rating=Rating::find($id);
        $rating->delete();
        $ratings=Rating::latest()->get();
        return redirect(route('admin.ratings',compact('ratings')))->with('success',"Rating '$id' deleted successfully.");
    }
}
