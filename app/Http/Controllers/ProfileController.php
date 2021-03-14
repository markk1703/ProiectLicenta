<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->idRol==1)
        return view('admin.profile');
    else return view('profile');
    }

    public function updateAvatar(Request $request)
    {//handle upload imagine
       
        if($request->hasFile('imagine') && Auth::user()->idRol==1)
        {
            $imagine=$request->file('imagine');
            $filename=time() . '.' . $imagine->getClientOriginalExtension();
            Image::make($imagine)->resize(300,300)->save(public_path('/uploads/avatars/admin/'.$filename));
            
            $user=Auth::user();
            $user->imagine=$filename;
            $user->save();
            return redirect('/profile')->with('user',Auth::user());
        }
        else if($request->hasFile('imagine') && Auth::user()->idRol==2)
        {
            $imagine=$request->file('imagine');
            $filename=time() . '.' . $imagine->getClientOriginalExtension();
            Image::make($imagine)->resize(300,300)->save(public_path('/uploads/avatars/'.$filename));
            
            $user=Auth::user();
            $user->imagine=$filename;
            $user->save();
            return redirect('/profile')->with('success','Imagine adaugata cu succes.');;
        }
        
    }
    public function updateProfile(Request $request)
    {//handle upload profile
        $this->validate($request,[
            'nume'=>'required|string',
            'prenume'=>'required|string',
            'email'=>'email|unique:users',
        ]);

      
        $user=Auth::user();
        $user->nume=$request['nume'];
        $user->prenume=$request['prenume'];
        $user->email=$request['email'];
        $user->save();
        return redirect('/profile')->with('success','Informatii actualizate cu succes.');
        
    }
    public function updateEmail(Request $request)
    {
        $this->validate($request,[
            'email'=>'nullable|string|unique:users',
        ]);
        $user=Auth::user();
        $user->email=$request['email'];
        $user->save();
        return redirect('/profile')->with('success','Email actualizat cu succes.');
    }

    public function updateUsername(Request $request)
    {
        $this->validate($request,[
            'username'=>'nullable|string|unique:users',
        ]);
        $user=Auth::user();
        $user->username=$request['username'];
        $user->save();
        return redirect('/profile')->with('success','Nume utilizator actualizat cu succes.');
    }


    public function updatePassword(Request $request)
    {//handle upload profile
        $user=Auth::user();
        if(Auth::user()->password){//daca utilizatorul are setata o parola
        $this->validate($request,[
            'parola'=>'required|min:8',
            'parolaNoua'=>'required|min:8',
            'parolaNoua_confirm'=>'required|min:8',
        ]);
        if(Hash::check($request['parola'],Auth::user()->password) && ($request['parolaNoua']==$request['parolaNoua_confirm']))
        {$user->password=Hash::make($request['parolaNoua']);
        $user->save();
        return redirect('/profile')->with('success','Parola actualizata cu succes.');
        }
        else return redirect('/profile')->with('error','Parolele nu corespund.');
    }
        else{//daca utilizatorul nu are o parola existenta
            $this->validate($request,[
                'parola'=>'nullable|min:8',
                'parolaNoua'=>'required|min:8',
                'parolaNoua_confirm'=>'required|min:8',
            ]);
        
            if($request['parolaNoua']==$request['parolaNoua_confirm'])
        {$user->password=Hash::make($request['parolaNoua']);
        $user->save();
        return redirect('/profile')->with('success','Parola actualizata cu succes.');
        }
        else return redirect('/profile')->with('error','Parolele nu corespund.');
        }

        
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
        //
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
