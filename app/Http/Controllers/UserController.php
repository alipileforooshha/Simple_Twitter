<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\follow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create(){
        
    }
    public function username(Request $req){
        $validated = $req->validate([
            'username' => "required | max:10 | min:5"
        ]);
        auth()->user()->username = $req->username;
        $user = auth()->user();
        $user->save();
        return redirect('/Dashboard');
    }
    public function email(Request $req){
        $validated = $req->validate([
            'email' => 'email | required'
        ]);
        auth()->user()->email = $req->email;
        $user = auth()->user();
        $user->save();
        return redirect('/Dashboard');
    }
    public function password(Request $req){
        $validated = $req->validate([
            'password' => 'required | confirmed | min:8 | max:25'
        ]);
        echo $req->password;
        auth()->user()->password = Hash::make($req->password);
        $user = auth()->user();
        $user->save();
        return redirect('/Dashboard');
    }
    public function avatar(Request $req){
        $filename = $req->avatar->getClientOriginalName();
        $req->avatar->storeAs('images',$filename,'public');
        auth()->user()->avatar = $filename;
        auth()->user()->save();
        return redirect('/Dashboard');
    }
    public function profile(User $user){
        $posts = $user->Post;
        return view('profile',['posts'=>$posts, 'user'=>$user]);
    }
    public function bio(Request $req){
        $user = auth()->user();
        $user->bio = $req->bio;
        $user->save();
        return redirect()->route('profile.user',[auth()->user()]);
    }
    public function follow(User $user){
        follow::create([
            'isfollowing' => auth()->user()->id,
            'isfollowed' => $user->id
        ]);
        return redirect('/index');
    }
}
