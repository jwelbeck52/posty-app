<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout(){
        //log out user
        Auth::logout();

        //redirect user to homepage
        return redirect()->route('home');
    }
}
