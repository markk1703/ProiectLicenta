<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Admin_UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $utilizatori=User::orderBy('stamp','desc')->paginate(7);
        return view('admin.utilizatori.index')->with('utilizatori',$utilizatori);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roluri=Rol::orderBy('rolname','asc')->get();
        return view('admin.utilizatori.create')->with('roluri',$roluri);
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
            'Nume' => ['required', 'string', 'max:255'],
            'Prenume' => ['required', 'string', 'max:255'],
            'Email' => [
                'required',
                'string',
                'email',
                'max:255',
            ],
            'UserName' => ['required', 'string', 'max:255'],
            'Parola' => ['required', 'string', 'min:8'],
            'rol'=>'required',
            'IsActiv',
            'stamp'
        ]);

        $utilizator=new User;
        $utilizator->Nume=$request->input('Nume');
        $utilizator->Prenume=$request->input('Prenume');
        $utilizator->UserName=$request->input('UserName');
        $utilizator->Email=$request->input('Email');
        $utilizator->Parola=Hash::make($request->input('Parola'));
        
        $roluri=Rol::all();
        foreach($roluri as $rol)
        if($rol->rolname==$request->input('rol'))
        {
        $utilizator->IdRol=$rol->id;
        break;
        }

        $utilizator->save();

        return redirect('/users')->with('success','Utilizator adaugat cu succes.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $utilizator=User::find($id);
        $roluri=Rol::all();
        foreach($roluri as $rol)
        {
            if($rol->id==$utilizator->IdRol)
            $rolname=$rol->rolname;
        }
        return view('admin.utilizatori.show')->with('utilizator',$utilizator)->with('rolname',$rolname);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $utilizator=User::find($id);
        $roluri=Rol::orderBy('rolname','asc')->get();
        foreach($roluri as $rol)
        if($rol->id==$utilizator->IdRol)
        {
        $rolname=$rol->rolname;
        break;
        }
        return view('admin.utilizatori.edit')->with('utilizator',$utilizator)->with('roluri',$roluri)->with('rolname',$rolname);
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
            'Nume' => ['required', 'string', 'max:255'],
            'Prenume' => ['required', 'string', 'max:255'],
            'Email' => [
                'required',
                'string',
                'email',
                'max:255',
            ],
            'UserName' => ['required', 'string', 'max:255'],
            'rol'=>'required',
            'IsActiv',
            'stamp'
        ]);

        $utilizator=User::find($id);
        $utilizator->Nume=$request->input('Nume');
        $utilizator->Prenume=$request->input('Prenume');
        $utilizator->UserName=$request->input('UserName');
        $utilizator->Email=$request->input('Email');
        
        $roluri=Rol::all();
        foreach($roluri as $rol)
        if($rol->rolname==$request->input('rol'))
        {
        $utilizator->IdRol=$rol->id;
        break;
        }

        $utilizator->save();

        return redirect('/users')->with('success','Date utilizator actualizate cu succes.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $utilizator=User::find($id);
        $utilizator->delete();
        $allContinut=Continut::all();//stergere continut utilizator
        foreach($allContinut as $item)
        {
            if($item->idUtilizator==$utilizator->id)
            $item->delete();
        }
        $allDiscutii=Chat::all();//stergere discutii utilizator
        foreach($allDiscutii as $item)
        {
            if($item->idUtilizator==$utilizator->id)
            $item->delete();
        }
        return redirect('/users')->with('success','Utilizator sters cu succes.');
    }
}

