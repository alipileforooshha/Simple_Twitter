<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\retweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function create(Request $req){
        
        Post::create([
            'content' => $req->content,
            'user_id' => auth()->user()->id
        ]);
        return redirect('/');
    }
    public function edit(Request $req,Post $post){
        $post->content = $req->content;
        $post->save();
        return redirect('/');
    }
    public function delete(Post $post){
        $post->delete();
        return redirect('/');
    }
    public function retweet(Post $post){
        retweet::create([
            'user_id' => auth()->user()->id,
            'post_id' => $post->id
        ]);
        return redirect('/');
    }
    public function show(Post $post){
        
        return view('singlePost',['post'=>$post]);
    }
}
