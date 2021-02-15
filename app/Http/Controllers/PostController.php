<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){
        return view('posts.index');
    }

    public function store(Request $request){

        //validate request
        $this -> validate($request, [
            'body' => 'required|max:255'
        ]);

        //dd(auth()->id()); //get authenticated user id using auth helper . does not require importing Auth Facade
        //dd($request->user()->id); // get user id using the request
        //dd($request->user()->id); // get user id using Auth Facade. requires importing Auth Facade
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
}
