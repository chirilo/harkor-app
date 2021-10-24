<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostsController; // blogpost

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
    //return view('posts/postsfeed'); // this will serve as the landing page
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); // commented out but this is the default

// set home route to display the posts feed page
Route::get('/home', [App\Http\Controllers\PostsController::class, 'index'])->name('home');
// posts API
Route::post('/storePost',[App\Http\Controllers\PostsController::class, 'storePost']);
Route::get('/getPosts', [App\Http\Controllers\PostsController::class, 'getPosts']);
Route::post('/deletePost/{id}', [App\Http\Controllers\PostsController::class, 'deletePost']);
Route::post('/editPosts/{id}', [App\Http\Controllers\PostsController::class, 'editPost']);