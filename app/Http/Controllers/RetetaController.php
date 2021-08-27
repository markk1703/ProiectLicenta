<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reteta;
use App\Models\User;
use App\Models\ValoriNutritionale;
use App\Models\Ingrediente;
use OpenFoodFacts;
use DB;
use \stdClass;

class RetetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {  
        $user=null;
        $tag=null;
        $retete=Reteta::orderBy('created_at','desc')->paginate(5);
        if($request->utilizator_id)
        {$retete=Reteta::orderBy('created_at','desc')->where('utilizator_id',$request->utilizator_id)->paginate(5);
        $user=User::find($request->utilizator_id);}
        if($request->tag){
            $retete=Reteta::withAnyTags($request->tag)->paginate(5);
            $tag=$request->tag;
        }
        return view('retete.index')->with(compact('retete','user','tag'));
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
    public function getColumns($jsonName)//ia coloanele pt afisat
    {
        $path = storage_path() . "/db/$jsonName";
        $content = file_get_contents($path);
        $ingrediente=json_decode($content);
        $tabValori=array();

        $i1=$ingrediente[array_key_first($ingrediente)];
        $i1=get_object_vars($i1);
        $coloane=array();
        foreach($i1 as $key=>$i){
            array_push($coloane,$key);
        }
        return $coloane;
    }
    public function getValoriNutritionale(Reteta $reteta)//valori nutritionale pentru o reteta
    {
        $path = storage_path() . "/db/valori_nutritionale.json";
        $content = file_get_contents($path);
        $ingrediente=json_decode($content);
        // $columns=array('proteine','grasimi','carbohidrati','calorii');
        $um=array('grame','gram','gr','g','gr buchetele',' ','mg','kg','conserva','conserve','buc','bucati','bucata','capatani','capatana','tija','ml','l','catei','lingura','lingura cu varf','lingurita');
        $ingr=$reteta->ingrediente;//tablou cu ingrediente
        $myIngredient=new stdClass();//obiect cu val unui ingredient
        $tabValori=array();//array cu obiectele adaugate
        foreach($ingr as $i)//parcurgere toate ingredientele din reteta
        {   
            foreach($ingrediente as $ingredient)//parcurgere toate ingredientele din json
            {   
                $pieces=explode(' ',$i);//tablou cu cuvintele unui ingredient
                $pieces=$this->unaccent($pieces);
                $result = array_intersect($um, $pieces);//gaseste daca exista cuvantul pt u.m.
                $denumireCompleta=implode(" ",$pieces);//denumire inclusiv gramaj
                $denumireCompleta=$this->unaccent($denumireCompleta);

                if(isset($result[array_key_first($result)])){
                    $result=$result[array_key_first($result)];
                if (($pos = strpos($denumireCompleta, $result)) !== FALSE) { 
                    $denumire = explode(' ',$denumireCompleta);
                    $foundIndex = array_search($result,$denumire);
                    if($foundIndex!==FALSE)
                    $denumire = array_slice($denumire, $foundIndex + 1);
                    $denumire=implode(" ",$denumire);
                }
                if(str_starts_with(strtolower($denumire),$this->unaccent($ingredient->denumire))!== FALSE)
                {
                    $myIngredient=$ingredient;
                    array_push($tabValori,$myIngredient);
                }
                else if(str_starts_with($this->unaccent($ingredient->denumire),strtolower($denumire))!== FALSE)
                {
                    $myIngredient=$ingredient;
                    array_push($tabValori,$myIngredient);
                }
                    } 
                    else{
                        $result=$pieces[array_key_first($pieces)];
                        if (($pos = strpos($denumireCompleta, $result)) !== FALSE) { 
                            $denumire = explode(' ',$denumireCompleta);
                            $foundIndex = array_search($result,$denumire);
                            if($foundIndex!==FALSE)
                            $denumire = array_slice($denumire, $foundIndex + 1);
                            $denumire=implode(" ",$denumire);
                        }
                    }
            }
        }
    return $tabValori;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('retete.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   $this->validate($request,[
            'denumire'=>'required',
            'ingrediente'=>'required',
            'preparare'=>'required',
            'categorii'=>'required'
        ]);
        //  $productName=$request->denumire;
        //  $productData=$this->findProduct($productName);
        //  dd($productData);
        //  $nutriments=$productData[0]["nutriments"];
        //  $nutriscore_data=$productData[0]["nutriscore_data"];
        //  dd($nutriscore_data);
        
        $reteta=Reteta::create([
            'utilizator_id'=>Auth::id(),
            'denumire' => $request['denumire'],
            'ingrediente' => $request['ingrediente'],
            'mod_de_preparare' => $request['preparare'],
            'imagine_principala' => $request['imagine_princ'],
            'imagini' => $request['imagini'],
            'categorii'=>$request['categorii'],
            'URL_video' => $request['URLVideo'],
            'created_at' => now()
        ]);
        $tags=explode(',',$request['categorii']);
        $reteta->attachTags($tags);

        return redirect()->route('images.create',['denumire'=>$reteta->denumire,'id'=>$reteta->id])->with('success',"'$reteta->denumire' added successfully.");
    }
    public function findProduct($productName)
    {
        $productData = OpenFoodFacts::find($productName);
        return $productData;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
    $reteta=Reteta::findOrFail($id);
    $ingrediente=$reteta->ingrediente;
    $ingrediente=explode(", ",$ingrediente);
    $reteta->ingrediente=$ingrediente;//adauga array cu ingrediente
    $mod_de_preparare=$reteta->mod_de_preparare;
    $mod_de_preparare=explode(". ",$mod_de_preparare);
    $reteta->mod_de_preparare=$mod_de_preparare;//adauga array cu modul de preparare
    $user=User::findOrFail($reteta->utilizator_id);
    $reteta->user=$user;//adauga array cu utilizatorul
    if($reteta->imagini!=null){
        $imaginiString=$reteta->imagini;
        $imagini=explode(", ",$imaginiString);
        $reteta->imagini=$imagini;//adauga array cu imagini
    }
    $tabValori=$this->getValoriNutritionale($reteta);
    $reteta->tabValori=$tabValori;//adauga tabValori in reteta
    $coloane=$this->getColumns('valori_nutritionale.json');
    $reteta->coloane=$coloane;//adauga coloane in reteta
    $reteta->rating=null;
    $reteta->avg_rating=null;
        return view('retete.show',compact('reteta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {$reteta=Reteta::findOrFail($id);
        $taguri="";
        foreach($reteta->tags()->get() as $key=>$tag)
          {
              if($key<count($reteta->tags()->get())-1)
              $taguri=$taguri.$tag->name.",";
              else
              $taguri=$taguri.$tag->name;
        }
        return view('retete.edit',compact('reteta','taguri'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    $this->validate($request,[
        'denumire'=>'required',
        'ingrediente'=>'required',
        'preparare'=>'required',
        'categorii'=>'required'
    ]);
    $reteta=Reteta::find($id);
    $reteta->denumire=$request->input('denumire');
    $reteta->ingrediente=$request->input('ingrediente');
    $reteta->mod_de_preparare=$request->input('preparare');
    $oldTags=explode(',',$reteta['categorii']);
    $reteta->detachTags($oldTags);
    $substring = ',';
    $str = $request['categorii'];
    while(substr($str,-strlen($substring))===$substring)
    $str = substr($str, 0, strlen($str)-strlen($substring));
    $tags=explode(',',$str);
    $reteta->attachTags($tags);
    $reteta->categorii=$str;
    $reteta->save();
    
    return redirect()->route('images.edit',$id)->with('success',"'$reteta->denumire' modified successfully.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {$reteta=Reteta::find($id);
        Reteta::find($id)->delete();
        return redirect()->route('retete.index',['utilizator_id'=>Auth::id()])->with('success',"'$reteta->denumire' deleted successfully.");
    }

    public function discover()
    {   
        if(!Auth::user()){
        $retete = DB::table('retete')
            ->inRandomOrder()->get();
        }
        else{
            $retete = Reteta::where('utilizator_id','!=', Auth::id())
            ->inRandomOrder()
            ->get();
        }
        return view('retete.discover')->with(compact('retete'));
    }

}
