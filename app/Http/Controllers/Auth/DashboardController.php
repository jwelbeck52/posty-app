<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {   //use middleware auth to check that only authenticated users can view this page
        $this->middleware(['auth']);
    }

    public function index()
    {
        return view('auth.dashboard');
    }

}
