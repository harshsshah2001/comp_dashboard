<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Services\AdminService;


class ProductController extends Controller
{

    protected $service;

    public function __construct(AdminService $service)
    {
        $this->service = $service;
    }

    public function productform(){

        $category = Category::select('categoryTitle')->get();
        $products = Product::all();
        return view("admin.product.create_product",compact("category","products"));
    }
    public function store(Request $request)
    {
        $rules = [
            'category'         => 'nullable|string',
            'productname'        => 'required|string|max:255',
            'image'              => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'icon'               => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'productdescription' => 'nullable|string',
            'price'              => 'nullable|numeric',
            'saleprice'          => 'nullable|numeric',
        ];

        return $this->service->store(
            $request,
            $rules,
            Product::class,
            [
                'image' => 'product/image',
                'icon'  => 'product/icon',
            ]
        );
    }

}
