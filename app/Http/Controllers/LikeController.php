<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like(Post $post){
        Like::create([
            'user_id' => auth()->user()->id,
            'post_id' => $post->id
        ]);
        return redirect('/');
    }
    public function dislike(Post $post){
        Like::where([
            'user_id' => auth()->user()->id,
            'post_id' => $post->id
        ])->delete();
        return redirect('/');
    }
}
