<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenFoodFacts;


class NutritieController extends Controller
{
    public function scan(Request $request)
    {  $dictionar=['carbohydrates_100g'=>'carbohidrati_100g',
    'energy-kcal_100g'=>'energie-kcal_100g',
    'fat_100g'=>'grasimi_100g',
    'saturated-fat_100g'=>'grasimi-saturate_100g',
    'proteins_100g'=>'proteine_100g',
    'salt_100g'=>'sare_100g',
    'sugars_100g'=>'zahar_100g',
    'sodium_100g'=>'sodiu_100g',];
     
        if($request->has('barcode')){
        $produs=OpenFoodFacts::barcode($request->barcode);
        if($produs!=null){
        $valNutritionale=$produs['nutriments'];
        $denumire=$produs['product_name'];
        $img=$produs['selected_images'];
        $img=$img['front']['small'];
        $img=array_pop($img);
        $valoriNutritionale_100=array();
        $valoriNutritionale=array();
        $cantitate=$request['cantitate'];
        foreach($dictionar as $key1=>$item)
        {
            foreach($valNutritionale as $key2=>$val)
            {if($key1==$key2)
                $valoriNutritionale_100[$dictionar[$key1]]=$valNutritionale[$key2];
            }
        }
        foreach($valoriNutritionale_100 as $key=>$item)
        {
            $valoriNutritionale[substr($key,0,-5)]=$valoriNutritionale_100[$key]*$cantitate/100;
        }
        return view('nutritie.scan')->with(compact('denumire'))->with(compact('valoriNutritionale_100'))->with(compact('valoriNutritionale'))->with(['cantitate'=>$cantitate])->with(['img'=>$img]);}}
        else
        return view('nutritie.scan');
    }
}
