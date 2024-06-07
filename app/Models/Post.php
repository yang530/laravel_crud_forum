<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ["title", "content", "author_id"];

    //defines relation ship bw Post->author_id and User 
    public function getAuthor(){
        return $this->belongsTo(User::class, "author_id");
    }

    public function getComments(){
        return $this->belongsTo(Comment::class, "id");
    }
}
