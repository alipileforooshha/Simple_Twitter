<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create(Request $req){
        // Auth::logout();
        $this->validate($req,[
            'username' => "required | max:20 | min:5",
            'email' => 'email | required',
            'password' => 'required | confirmed | min:8 | max:25'
        ]);
        User::create([
            'username' => $req->username,
            'email' => $req->email,
            'password' =>Hash::make($req->password) 
        ]);
        if(Auth::attempt($req->only('email','password'))){
            return redirect('/');
        }else{
            echo 'no';
            echo $req->email;
        }
        
    }
}
