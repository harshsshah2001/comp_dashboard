<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function signinform()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $admin = \App\Models\Admin::where('email', $request->email)->first();

        if (!$admin) {
            return response()->json([
                'status' => 'error',
                'field' => 'email',
                'message' => 'Email not found',
            ]);
        }

        if ($admin->password !== $request->password) {
            return response()->json([
                'status' => 'error',
                'field' => 'password',
                'message' => 'Invalid password',
            ]);
        }

        session(['admin_id' => $admin->id, 'admin_email' => $admin->email]);

        return response()->json([
            'status' => 'success',
            'message' => 'Login successful',
        ]);
    }
}
