<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenFoodFacts;


class NutritieController extends Controller
{   public function index(){
    return view('nutritie.scan');
}
    public function scan(Request $request)
    {  $dictionar=[
    'energy-kcal_100g'=>'energie-kcal_100g',
    'proteins_100g'=>'proteine_100g',
    'casein_100g'=>'cazeina_100g',
    'carbohydrates_100g'=>'carbohidrati_100g',
    'sugars_100g'=>'zaharuri_100g',
    'sucrose_100g'=>'zaharoza_100g',
    'glucose_100g'=>'glucoza_100g',
    'fructose_100g'=>'fructoza_100g',
    'lactose_100g'=>'lactoza_100g',
    'starch_100g'=>'amidon_100g',
    'fat_100g'=>'grasimi_100g',
    'saturated-fat_100g'=>'grasimi saturate_100g',
    'trans-fat_100g'=>'grasimi trans_100g',
    'cholesterol_100g'=>'colesterol_100g',
    'fiber_100g'=>'fibre_100g',
    'sodium_100g'=>'sodiu_100g',
    'alcohol_100g'=>'alcool_100g',
    'vitamin-a_100g'=>'vitamina A_100g',
    'vitamin-d_100g'=>'vitamina D_100g',
    'vitamin-e_100g'=>'vitamina E_100g',
    'vitamin-k_100g'=>'vitamina K_100g',
    'vitamin-c_100g'=>'vitamina C_100g',
    'vitamin-b1_100g'=>'vitamina B1_100g',
    'vitamin-b2_100g'=>'vitamina B2_100g',
    'vitamin-pp_100g'=>'vitamina PP_100g',
    'vitamin-b6_100g'=>'vitamina B6_100g',
    'vitamin-b9_100g'=>'vitamina B9_100g',
    'vitamin-b12_100g'=>'vitamina B12_100g',
    'biotin_100g'=>'vitamina B8_100g',
    'potassium_100g'=>'potasiu_100g',
    'calcium_100g'=>'calciu_100g',
    'phosphorum_100g'=>'fosfor_100g',
    'iron_100g'=>'fier_100g',
    'magnesium_100g'=>'magneziu_100g',
    'zinc_100g'=>'zinc_100g',
    'copper_100g'=>'cupru_100g',
    'manganese_100g'=>'mangan_100g',
    'fluoride_100g'=>'fluor_100g',
    'selenium_100g'=>'seleniu_100g',
    'iodine_100g'=>'iod_100g',
    'caffeine_100g'=>'cafeina_100g',
    'taurine_100g'=>'taurina_100g',
    // 'ph_100g'=>'pH_100g',
    // 'fruits-vegetables-nuts_100g'=>'fructe/legume/nuci_100g', //in procente
    // 'nutrition-score-fr_100g'=>'scor nutritional-fr_100g',
    // 'nutrition-score-uk_100g'=>'scor nutritional-uk_100g'
];
    $nutriscore_images=[
        'a'=>'https://eurohealthnet-magazine.eu/wp-content/uploads/2019/12/RVB-A-cerne%C2%A6%C3%BC-1024x637.jpg',
        'b'=>'https://english.fleischwirtschaft.de/news/media/4/Danone-NutriScore-31047.jpeg',
        'c'=>'https://pbs.twimg.com/media/EcKi3W6X0AAzGPZ.jpg',
        'd'=>'https://media.istockphoto.com/vectors/nutriscore-official-labels-vector-id1163487432?b=1&k=6&m=1163487432&s=170667a&w=0&h=AMp98_AspDY6b5oocM8qRYa_0Obkhzy5-immBdIcsng=',
        'e'=>'https://www.abzonline.de/news/media/7/40-Vertre-ford-von-der-EU-ein-verpflichte-Einfhr-d-62400.jpeg'
    ];
     
        if($request->has('barcode')){
        $produs=OpenFoodFacts::barcode($request->barcode);
        if(count($produs)>0){
        $valNutritionale=$produs['nutriments'];
        $nutrient_levels=null;
        if(array_key_exists('nutrient_levels',$produs))
            $nutrient_levels=$produs['nutrient_levels'];
        if(array_key_exists('product_name',$produs))
            $denumire=$produs['product_name'];
        if(array_key_exists('selected_images',$produs))
            $img=$produs['selected_images'];
        if((isset($img['front']['small'])))
            {$img=$img['front']['small'];
            $img=array_pop($img);}
            elseif((isset($img['ingredients']['small'])))
                {$img=$img['ingredients']['small'];
                $img=array_pop($img);}
        $nutriscore_grade=null;
        $nutriscore_image=null;
        if(array_key_exists('nutriscore_grade',$produs))
            {$nutriscore_grade=$produs['nutriscore_grade'];
            $nutriscore_image=$nutriscore_images[$nutriscore_grade];
            }
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
        return view('nutritie.scan',compact('denumire','valoriNutritionale_100','valoriNutritionale','cantitate','img','nutriscore_grade','nutriscore_image'))->with('success',"Produsul căutat a fost găsit cu succes.");
    }
    else 
        return back()->with('error',"Produsul căutat nu a fost găsit.");;
        }
    }
}
