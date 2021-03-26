<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reteta;

class RetetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $retete=Reteta::orderBy('created_at','desc')->paginate(5);
        if($request->utilizator_id)
        $retete=Reteta::orderBy('created_at','desc')->where('utilizator_id',$request->utilizator_id)->paginate(5);
        return view('retete.index')->with(compact('retete'));
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
        $reteta=Reteta::create([
            'denumire' => $request['denumire'],
            'ingrediente' => $request['ingrediente'],
            'mod_de_preparare' => $request['preparare'],
            'categorii'=>$request['categorii'],
            'imagine_principala' => $request['imagine_princ'],
            'imagini' => $request['imagini'],
            'URL_video' => $request['URLVideo'],
            'utilizator_id'=>Auth::id(),
            'created_at' => now()
        ]);
        return redirect()->action('UploadImagesController@create',['denumire'=>$reteta->denumire,'id'=>$reteta->id])->with('success',"'$reteta->denumire' added successfully.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {$reteta=Reteta::findOrFail($id);
    $imaginiString=$reteta->imagini;
    $imagini=explode(", ",$imaginiString);
        return view('retete.show',['reteta'=>$reteta,'imagini'=>$imagini]);
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
    
    return redirect()->action('UploadImagesController@edit',$id)->with('success',"'$reteta->denumire' modified successfully.");
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
        return redirect()->action('RetetaController@index')->with('success',"'$reteta->denumire' deleted successfully.");
    }

}
