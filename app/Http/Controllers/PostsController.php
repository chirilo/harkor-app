<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;

class PostsController extends Controller
{

	/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('posts/postsfeed');
    }

    //
    public function storePost(Request $request) {
        $post = new Posts();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();

        return $post;
    }

    public function getPosts(Request $request) {
        $posts = Posts::all();

        return $posts;
    }

    public  function editPost(Request $request, $id){
        $post = Posts::where('id',$id)->first();

        $post->title = $request->get('val_1');
        $post->description = $request->get('val_2');
        $post->save();

        return $post;
    }

    public function deletePost(Request $request){
        $post = Posts::find($request->id)->delete();
    }
}
