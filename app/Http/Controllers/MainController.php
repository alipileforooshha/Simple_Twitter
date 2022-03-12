<?php

namespace App\Http\Controllers;

use App\Models\follow;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index(){
        $posts = Post::orderBy('updated_at','desc')->get();
        $follow = follow::select('isfollowed')->where('isfollowing',auth()->user()->id)->get();
        $users = User::whereNotIn('id',$follow)->take(5)->get();
        return view('index',['posts'=>$posts, 'users'=>$users]);
    }
}
