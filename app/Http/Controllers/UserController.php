<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Countdowns;
use App\Models\Imagebox;
use App\Models\Slider;
use App\Models\Product;
use Illuminate\Http\Request;
use Nette\Utils\Image;

class UserController extends Controller
{
    public function Homepage()
    {
        $allcategories = Category::all();
        $allproducts = Product::all();
        $imageboxs = Imagebox::all();
        $sliders = Slider::all();
        $countdowns = Countdowns::where('status', 1)->latest()->first();
        return view('dashboard.dashboard', compact('allcategories', 'allproducts', 'imageboxs', 'sliders', 'countdowns'));
    }
}
