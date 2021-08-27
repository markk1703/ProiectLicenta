<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Reteta;
use Hash;
use Str;

class UsersController extends Controller
{
    public function index(){
        $users=User::latest()->paginate(12);
        return view('admin.users.index',compact('users'));
    }
    public function create()
    {
        return view('admin.users.create');
    }
    public function store(Request $request){
        $this->validate($request,[
            'nume' => ['required', 'string', 'max:255'],
            'prenume' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'rol'=>'required',
        ]);
        User::create([
            'nume' => $request->input('nume'),
            'prenume' => $request->input('prenume'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'),),
            'stamp'=>now(),
            'remember_token' => Str::random(10),
            'rol'=>$request->input('rol')
        ]);

        $users=User::latest()->get();
        return view('admin.users.index',compact('users'));
    }
    public function show($id){
        $user=User::find($id);
        $retete=Reteta::where('utilizator_id',$id)->get();
        return view('admin.users.show',compact(['user','retete']));
    }
    public function edit($id){
        $user=User::find($id);
        return view('admin.users.edit',compact('user'));
    }
    public function update(Request $request, $id){
        $this->validate($request,[
            'nume'=>'required',
            'prenume'=>'required',
            'username'=>'required',
            'email'=>'required',
            'rol'=>'required'
        ]);
        $user=User::find($id);
        $user->nume=$request->input('nume');
        $user->prenume=$request->input('prenume');
        $user->username=$request->input('username');
        $user->email=$request->input('email');
        $user->rol_id=$request->input('rol');
        $user->save();

        $user=User::find($id);
        $retete=Reteta::where('utilizator_id',$id)->get();
        return view('admin.users.show',compact(['user','retete']));
    }
    public function destroy($id){
        $user=User::find($id);
        $nume=$user->username;
        $user->delete();
        $users=User::latest()->get();
        return redirect(route('admin.users',compact('users')))->with('success',"'$nume' deleted successfully.");
    }
}
