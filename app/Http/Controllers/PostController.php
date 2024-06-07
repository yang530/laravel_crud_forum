<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Models\Post; //import model Post
use App\Models\Comment;

class PostController extends Controller
{
    public function createPost(Request $request){

        $postInput = $request->validate([
            "title" => "required",
            "content" => "required"
        ]);

        $postInput["title"] = strip_tags($postInput["title"]);
        $postInput["content"] = strip_tags($postInput["content"]);

        $postInput["author_id"] = Auth::id();

        Post::create($postInput);

        return view("user_dashboard", ["username" => Auth::user()->name, "posts2display" => Post::all()->sortByDesc("updated_at")]);
    }

    public function showPost(Post $post){
        return view("showPost", [
            "post_id" => $post["id"],
            "post_title" => $post["title"],
            "post_author" => $post->getAuthor->name,
            "post_date" => $post["created_at"],
            "post_content" => $post["content"],
            "comments2display" => Comment::where("post_id", $post["id"])->get()->sortBy("created_at")
        ]); 
    }

    public function editPost(Request $request, Post $post){

        $formInput = $request->validate([
            "title" => "required",
            "content" => "required"
        ]);

        if(Auth::id() == $post["author_id"]){
            $post->update($formInput);
        }

        return view("user_dashboard", ["username" => Auth::user()->name, "posts2display" => Post::all()->sortByDesc("updated_at")]);
    }

    public function deletePost(Post $post){

        if(Auth::id() == $post["author_id"]){
            $post->delete();
        }

        return view("user_dashboard", ["username" => Auth::user()->name, "posts2display" => Post::all()->sortByDesc("updated_at")]);
    }   
}
