<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function registerform(){
        return view('dashboard.registerform');
    }

    public function registeruser(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $validated['password'] = bcrypt($validated['password']);

        $user = User::create($validated);

        return response()->json([
            'status' => true,
            'message' => 'User registered successfully',
        ]);
    }

    public function userloginform(){
        return view('dashboard.loginform');
    }

    public function userlogin(Request $request){
        $credentials = $request->validate([
            'email'=>'required|email',
            'password'=>'required|string|min:8',
        ]);

       $authenticated = Auth::guard('user')->attempt($credentials);

       if($authenticated){
        $request->session()->regenerate();

        session([
            'user_id' => Auth::guard('user')->user()->id,
            'user_name' => Auth::guard('user')->user()->name,
            'user_email' => Auth::guard('user')->user()->email
        ]);

        return response()->json([
            'status'=>true,
            'message'=>'User logged in successfully',
            'redirect' => route('homepage')
        ]);

       } else {
           return response()->json([
               'status' => false,
               'message' => 'Invalid email or password.'
           ]);
       }
    }
}
