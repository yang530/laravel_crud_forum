<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Models\User; //import built in model User
use App\Models\Post;


class UserController extends Controller
{   
    //authenticate user and load the user dashboard page
    public function authenticateUser(Request $request){

        $inputInfo = $request->validate([
            "name"=>["required", "min:3", "max:12"],
            "password"=>"required",
        ]);

        if(Auth::attempt($inputInfo) == true){
            return view("user_dashboard", ["username" => $inputInfo["name"], "posts2display" => Post::all()->sortByDesc("updated_at")]);
        }else{
            return redirect('/')->with('errors', 'Authentication failed.');
        }
        
    }

    public function userLogout(){
        Auth::logout();
        return redirect('/');
    }

    public function registerUser(Request $request){

        $inputInfo = $request->validate([
            "name"=>["required", "min:3", "max:12", Rule::unique("users", "name")],
            "password"=>["required", "min:8", "max:10"],
        ]);

        //set default email for user
        $inputInfo["email"] = $inputInfo["name"] . "@email.com";
        //manipulate database using model
        User::create($inputInfo);

        return view("registerOK");
    }
}
