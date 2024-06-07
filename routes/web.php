<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landing');
});

Route::get("/register", function (){
    return view("register");
});

Route::get("/showPost/{post}", [PostController::class, "showPost"]);
Route::put("/editPost/{post}", [PostController::class, "editPost"]);
Route::post("/commentPost/{post}", [CommentController::class, "createComment"]);
Route::delete('deletPost/{post}', [PostController::class, "deletePost"]);
Route::post("/user_dashboard", [UserController::class, "authenticateUser"]);
Route::post("/logout", [UserController::class, "userLogout"]);
Route::post("/registerOK", [UserController::class, "registerUser"]);
Route::post("/create_post", [PostController::class, "createPost"]);

