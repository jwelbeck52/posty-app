<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class RegisterController extends Controller
{
    public function __construct()
    {   //use middleware guest to check that only unauthenticated users(guests) can view this page
        $this->middleware(['guest']);
    }

    //show register page
    public function index(){
        return view('auth.register');
    }

    //register a new user
    public function store(Request $request){
        //validate form info
        //dd($request->only('email','password'));
       $this -> validate($request, [
            'name'=> 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed'
        ]);

        //store user info
        User::create([
        'name' => $request->name,
        'username' => $request->username,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        ]);
       
        //sign user in
        Auth::attempt($request->only('email','password'));


        //redirect to home page
        return redirect()->route('home');
    }
}
