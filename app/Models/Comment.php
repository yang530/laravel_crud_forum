<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ["content", "post_id", "author_id"];

    //comment and post
    public function getOGPost(){
        return $this->belongsTo(Post::class, "post_id");
    }

    //comment and comment auther
    public function getAuthor(){
        return $this->belongsTo(User::class, "author_id");
    }
}
