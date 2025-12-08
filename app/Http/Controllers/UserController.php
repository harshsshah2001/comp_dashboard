<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
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
        return view('dashboard.dashboard', compact('allcategories', 'allproducts','imageboxs','sliders'));
    }

}
