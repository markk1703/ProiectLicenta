<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reteta;

class SearchController extends Controller
{
    public function index()
    {
        return view('search.index');
    }
    public function search(Request $request)
    {   $term=$request->term;
        $retete=Reteta::where('denumire','LIKE','%'.$term.'%')->get();
        return view('search.inc.index-action',compact('retete'));
    }
}
