<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create(){
        return view('register.create');
    }
    public function store(){
    $info=request()->validate([
        'name'=>'required|max:30|min:2',
        'lastname'=>'required|max:30|min:2',
        'username'=>'required|max:30|min:5',
        'password'=>'required|max:50|min:8',
        'email'=>'required|email|max:128'
    ]);
    $info['password']=bcrypt($info['password']);
    $user=User::create($info);
    session()->flash('success','You have created an account.');
    auth()->login($user);
    return redirect('/');
}
}