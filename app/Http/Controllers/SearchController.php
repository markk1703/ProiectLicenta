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
    function unaccent($str)//pt ignorare diacritice
{
    $pattern = array(
        'â', 'Â', 'ă', 'Ă', 'î', 'Î', 'ț', 'Ț', 'ș', 'Ș',
        );
        $replace = array(
        'a', 'A', 'a', 'A', 'i', 'I', 't', 'T', 's', 'S',
        );
        return str_replace($pattern, $replace, $str);
}
    public function searchByIngredient(Request $request){
        $retete=Reteta::all();
        $ingrediente=$request->ingrediente;
        $um=array('grame','gram','gr','g',' ','mg','kg','conserva','conserve','buc','bucati','bucata','capatani','capatana','tija','ml','l','catei','lingura','lingurita');
        $reteteOK=array();
        foreach($retete as $reteta){
            $ingredienteOK=array();
            $ingReteta=explode(", ",$reteta->ingrediente);
            foreach($ingReteta as $ing){
                foreach($ingrediente as $ingredient)//parcurgere toate ingredientele selectate
            {
                $pieces=explode(' ',$ing);
                $pieces=$this->unaccent($pieces);
                $result = array_intersect($um, $pieces);//gaseste daca exista cuvantul pt u.m.
                $denumireCompleta=implode(" ",$pieces);//denumire inclusiv gramaj
                $denumireCompleta=$this->unaccent($denumireCompleta);
                $denumire = explode(' ',$denumireCompleta);
                $foundIndex = array_search($result,$denumire);
                if(isset($result[array_key_first($result)])){
                    $result=$result[array_key_first($result)];
                if (($pos = strpos($denumireCompleta, $result)) !== FALSE) { 
                    $denumire = explode(' ',$denumireCompleta);
                    $foundIndex = array_search($result,$denumire);
                    if($foundIndex!==FALSE)
                    $denumire = array_slice($denumire, $foundIndex + 1);
                    $denumire=implode(" ",$denumire);
                }
                if(str_starts_with(strtolower($denumire),$this->unaccent($ingredient))!== FALSE)
                {
                    array_push($ingredienteOK,$denumire);
                }
            }   
            }}
            if(count($ingredienteOK)==count($ingrediente))
            array_push($reteteOK,$reteta);
        }
        $retete=$reteteOK;
        return view('search.inc.index-action-ingredients',compact('retete'));
    }
}
