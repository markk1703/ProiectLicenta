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

class RetetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   $user=null;
        $retete=Reteta::orderBy('created_at','desc')->paginate(5);
        if($request->utilizator_id)
        {$retete=Reteta::orderBy('created_at','desc')->where('utilizator_id',$request->utilizator_id)->paginate(5);
        $user=User::find($request->utilizator_id);}
        return view('retete.index')->with(compact('retete','user'));
    }

    public function getValoriNutritionale_all($retete)//val nutritionale pt toate ingredientele
    {$tabValori_all=array();
        foreach($retete as $reteta){
            $tabValori=$this->getValoriNutritionale($reteta);
            array_push($tabValori_all,$tabValori);
            }
        return $tabValori_all;
    }

    public function getValoriNutritionale(Reteta $reteta)//valori nutritionale pentru o reteta
    {
    $retete=Reteta::select('id','utilizator_id','ingrediente')->orderBy('created_at','desc')->get();
    $ingrediente=Ingrediente::all();
    $valoriNutritionale=ValoriNutritionale::orderBy('created_at','desc')->get();
    
    $tabValori=array();
        foreach($ingrediente as $ingredient)
        {   $valori="";
            $columns=array('calorii','grasimi','grasimi saturate','glucide','proteine','sare','calciu');
            $ingr=explode(', ',$reteta->ingrediente);//tablou cu ingrediente
            foreach($ingr as $i)//parcurgere tablou
            {
                $pieces=explode(' ',$i);//tablou cu cuvintele unui ingredient
                $last_word = array_pop($pieces);//ultimul cuvant din ingredient
                if($ingredient->denumire==$last_word)
                foreach($valoriNutritionale as $valNutr)
                {
                    if($valNutr->ingredient_id==$ingredient->id)
                    {$valori=$valori.$ingredient->denumire.', ';
                    {foreach ($columns as $col)
                    $valori=$valori.$valNutr->$col.' '.$col.', ';
                    }
                    array_push($tabValori,$valori);
                    $valori=null;
                    }
                }
            }
        }
    return $tabValori;
    }
    public function getTotalValoriNutritionale($tabValori)
    {$valori=array();
    $rez=array();
        foreach($tabValori as $val)
        {
        $strings=null;
            $pieces = explode(',', $val);
            foreach($pieces as $key=>$piece)
            {
                $arr = explode(' ',trim($piece));
                if(count($arr)>1)
                    for($i=3;$i<count($arr);$i++)//array de dim 2 (valoare + string)
                    $arr[1]=$arr[1].' '.$arr[$i];
                if(count($arr)>1){
                    if ( ! isset($valori[$key])) {
                        $valori[$key] = 0;
                     }
                    $valori[$key]=$valori[$key]+$arr[0];
                    $strings[$key]=$arr[1].' '.$arr[2];
                }
            }
        }
        foreach($valori as $key=>$val)
        {if ( ! isset($rez[$key])) {
            $rez[$key] = "";
         }
         $rez[$key]=$valori[$key].' '.$strings[$key];
        }
        return $rez;
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
            'categorii'=>$request['categorii'],
            'imagine_principala' => $request['imagine_princ'],
            'imagini' => $request['imagini'],
            'URL_video' => $request['URLVideo'],
            'created_at' => now()
        ]);
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
    public function show($id)
    {$reteta=Reteta::findOrFail($id);
    $user=User::findOrFail($reteta->utilizator_id);
    $imaginiString=$reteta->imagini;
    $imagini=explode(", ",$imaginiString);
    $tabValori=$this->getValoriNutritionale($reteta);
    // $totalValori=$this->getTotalValoriNutritionale($tabValori); !!!! DE REVAZUT
    // $totalValori=implode(', ',$totalValori);
    $totalValori=null;
        return view('retete.show',compact('reteta','imagini','tabValori','totalValori','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('retete.edit',['reteta'=>Reteta::findOrFail($id)]);
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
    $reteta->categorii=$request->input('categorii');
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
        return redirect()->route('retete.index')->with('success',"'$reteta->denumire' deleted successfully.");
    }

    public function discover()
    {   
        $retete = DB::table('retete')
            ->join('followships', 'retete.utilizator_id', '=', 'followships.user2_id')
            ->join('users', 'users.id', '=', 'retete.utilizator_id')
            ->where('retete.utilizator_id','!=',Auth::id())
            ->select('users.*', 'retete.*')
            ->inRandomOrder()
            ->paginate(5);
        
        return view('retete.discover')->with(compact('retete'));
    }

}
