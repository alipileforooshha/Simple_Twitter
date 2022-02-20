<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index(){
        $posts = Post::orderBy('updated_at','desc')->get();
        return view('index',['posts'=>$posts]);
    }
}
