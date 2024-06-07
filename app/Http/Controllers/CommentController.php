<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    public function createComment(Request $request, Post $post){

        $postInput = $request->validate([
            "content" => "required"
        ]);

        $postInput["content"] = strip_tags($postInput["content"]);
        $postInput["author_id"] = Auth::id();
        $postInput["post_id"] = $post["id"]; 

        Comment::create($postInput);

        //return the commented post
        return view("showPost", [
            "post_id" => $post["id"],
            "post_title" => $post["title"],
            "post_author" => $post->getAuthor->name,
            "post_date" => $post["created_at"],
            "post_content" => $post["content"],
            "comments2display" => Comment::where("post_id", $post["id"])->get()->sortBy("created_at")
        ]); 

    }
}
