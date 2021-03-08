<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){
        //$posts = Post::get();
        $posts = Post::with(['user','likes'])->latest()->paginate(3); //get the latest post and display only 3 per page
        //dd($posts);

        return view('posts.index',compact('posts'));
    }

    public function store(Request $request){

        //validate request
        $this -> validate($request, [
            'body' => 'required|max:255'
        ]);

        //dd(auth()->id()); //get authenticated user id using auth helper . does not require importing Auth Facade
        //dd($request->user()->id); // get user id using the request
        //dd($request->user()->posts);

        /*
        // this method requires the creation of 'user_id' in fillable for Post Model
        Post::create([
            'user_id' => $request->user()->id,
            'body' => $request->body,
        ]);
        */

        $request->user()->posts()->create($request->only('body'));

        /*$request->user()->posts()->create([
            'body' => $request->body,
        ]);*/

        return back();
    }

    public function destroy(Post $post){
        //dd($post);
        //$post->likes()->delete();
        $post->delete();

        return back();
    }
}
