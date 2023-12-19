<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function destroy(){
        auth()->logout();

        return redirect('/');
    }
    public function create(){
        return view('sessions.create');
    }
    public function store(){
        $attr = request()->validate([
            'username'=>'required',
            'password'=>'required'
        ]);
        if(auth()->attempt($attr)){
            return redirect('/')->with('success');
        }
        return back()->withErrors(['username'=>'Username or Password is not correct']);
    }
}
