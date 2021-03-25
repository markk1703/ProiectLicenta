<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reteta;

class UploadFileController extends Controller
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
    public function create(Request $request)
    {
        return view('retete.imagini.create',['request'=>$request]);
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
        'select_file'=>'required|image|mimes:jpeg,png,jpg,gif'
    ]);

    $reteta=Reteta::find($request->id);//find reteta

    if($request->tip=='principal')//imagine principala
        {
        $image=$request->file('select_file');
        $new_name='avatar.'.$image->getClientOriginalExtension();
        $image->move(public_path("uploads/retete/".Auth::id()."/".$request['id']."/"),$new_name);
        
        $reteta->imagine_principala=$new_name;
        }
    else if($request->tip=='secundar')
        {
        $imaginiString=$reteta->imagini;//string imagini
        $imaginiArray=array();//array imagini
        if($imaginiString!=null)
        $imaginiArray=explode(", ",$imaginiString);//ia valorile din string

        $image=$request->file('select_file');
        $new_name=rand().'.'.$image->getClientOriginalExtension();
        $image->move(public_path("uploads/retete/".Auth::id()."/".$request['id']."/"),$new_name);
        
        $reteta->imagini=$reteta->imagine.$new_name.",";
        array_push($imaginiArray,$new_name);
        $reteta->imagini=implode(', ',$imaginiArray);//se adauga noul string in locul celui vechi
        }
        $reteta->save();
        return back()->with('success','Imagine incarcata cu succes')->with('path',$new_name);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
