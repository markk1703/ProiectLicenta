<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reteta;
use Spatie\Searchable\Search;

class SearchController extends Controller
{
    public function index()
    {
        return view('search.index');
    }
    public function search(Request $request)
    {   
        // $r=Reteta::query()
        // ->sort($request)
        // ->filter($request)
        // ->get();
        // dd($r);
        $retete = (new Search())
        ->registerModel(Reteta::class, 'denumire')
        ->search($request->term);
        return view('search.inc.index-action',compact('retete'));
    }
}
