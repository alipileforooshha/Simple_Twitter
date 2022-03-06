<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Comment;

class Post extends Model
{
    use HasFactory;
    public function User(){
        return $this->belongsTo(User::class);
    }
    public function like(){
        return $this->hasMany(Like::class);
    }
    public function likedBy(User $user){
        return $this->like->contains('user_id',$user->id);   
    }
    public function retweet(){
        return $this->hasMany(retweet::class);
    }
    public function comment(){
        return $this->hasMany(Comment::class);
    }
    protected $fillable = [
        'content',
        'user_id'
    ];
}
