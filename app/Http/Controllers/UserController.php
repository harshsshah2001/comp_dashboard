<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function Homepage()
    {
        $allcategories = Category::all();
        $allproducts = Product::all();
        return view('dashboard.dashboard', compact('allcategories', 'allproducts'));
    }
   
}
