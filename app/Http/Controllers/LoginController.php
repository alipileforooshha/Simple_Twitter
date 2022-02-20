<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $req){
        if(auth()->attempt($req->only('username','password'))){
            return redirect('/');
        }else{
            return view('login',['error'=>"some message"]);
        }
    }
}
