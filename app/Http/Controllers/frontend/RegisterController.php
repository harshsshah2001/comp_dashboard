<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function registerform(){
        return view('dashboard.registerform');
    }

    public function userloginform(){
        return view('dashboard.loginform');
    }
}
