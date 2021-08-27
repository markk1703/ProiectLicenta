<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reteta;
use App\Models\User;
use Auth;


class ContentController extends Controller
{
    public function index(){
        $retete=Reteta::latest()->paginate(8);
        return view('admin.posts.index',compact('retete'));
    }
    public function create()
    {
        return view('admin.posts.create');
    }
    public function store(Request $request){
        $this->validate($request,[
            'denumire'=>'required',
            'ingrediente'=>'required',
            'preparare'=>'required'
        ]);
        Reteta::create([
            'denumire'=>$request->input('denumire'),
            'ingrediente'=>$request->input('ingrediente'),
            'mod_de_preparare'=>$request->input('preparare'),
            'utilizator_id'=>Auth::id()
        ]);

        $retete=Reteta::latest()->get();
        return redirect(route('admin.posts',compact('retete')));
    }
    public function show($id){
        $reteta=Reteta::find($id);
        $user_id=$reteta->utilizator_id;
        $user=User::find($user_id);
        return view('admin.posts.show',compact(['reteta','user']));
    }
    public function edit($id){
        $reteta=Reteta::find($id);
        return view('admin.posts.edit',compact('reteta'));
    }
    public function update(Request $request, $id){
        $this->validate($request,[
            'denumire'=>'required',
            'ingrediente'=>'required',
            'preparare'=>'required'
        ]);
        $reteta=Reteta::find($id);
        $reteta->denumire=$request->input('denumire');
        $reteta->ingrediente=$request->input('ingrediente');
        $reteta->mod_de_preparare=$request->input('preparare');
        $reteta->save();

        $reteta=Reteta::find($id);
        $user_id=$reteta->utilizator_id;
        $user=User::find($user_id);

        return view('admin.posts.show',compact(['reteta','user']));
    }
    public function destroy($id){
        $reteta=Reteta::find($id);
        $denumire=$reteta->denumire;
        $reteta->delete();
        $retete=Reteta::latest()->get();
        return redirect(route('admin.posts',compact('retete')))->with('success',"'$denumire' deleted successfully.");
    }
}
