<?php

namespace App\Http\Controllers;

use App\Models\Adrese;
use App\Models\Localitate;
use Illuminate\Http\Request;
use Auth;

class AdreseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'localitate'=>'required',
            'judet'=>'required'
        ]);

        $localitate=$request['localitate'];
        $judet_id=$request['judet'];
        $user_id=Auth::user()->id;
        //daca nu exista localitatea in BD
        $loc = Localitate::where('denumire', '=', $localitate)->first();
        if($loc===null)
        {
            $localitateAdaugata=Localitate::create(array( //salveaza localitatea
                'denumire'=>$localitate,
                'judet_id'=>$judet_id
            ));
            $localitate_id=$localitateAdaugata->id;
        }
        else
        $localitate_id=$loc->id;
        
        $adresa=new Adrese;
        $adresa->user_id=$user_id;
        $adresa->judet_id=$judet_id;
        $adresa->localitate_id=$localitate_id;
        $adresa->save();
        // Adresa::create(array(//se adauga adresa noua
        //     'user_id'=>$user_id,
        //     'judet_id'=>$judet_id,
        //     'localitate_id'=>$localitate_id
        // ));
        return redirect()->action('ProfileController@index')->with('success','Adresa adaugata cu succes.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Adrese  $adrese
     * @return \Illuminate\Http\Response
     */
    public function show(Adrese $adrese)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Adrese  $adrese
     * @return \Illuminate\Http\Response
     */
    public function edit(Adrese $adrese)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Adrese  $adrese
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Adrese $adrese)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Adrese  $adrese
     * @return \Illuminate\Http\Response
     */
    public function destroy(Adrese $adrese)
    {
        //
    }
}
