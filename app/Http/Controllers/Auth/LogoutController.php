<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{   /*
    public function __construct()
    {   //use middleware auth to check that only authenticated users can view this page
        $this->middleware(['auth']);
    }*/

    public function logout(){
        //log out user
        Auth::logout();

        //redirect user to homepage
        return redirect()->route('home');
    }
}
