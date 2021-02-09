<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use App\Models\User;
//use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //show login page
    public function index()
    {
        return view('auth.login');
    }


    //login the user
    public function store(Request $request)
    {
        //validate request
        $this -> validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required'
        ]);


        //sign user in
        if(!Auth::attempt($request->only('email','password'))){
            return back()->with('status', 'Invalid login credentials');
        }

        //redirect to home page
        return redirect()->route('home');
    }
}
