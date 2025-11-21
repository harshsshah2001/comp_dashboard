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

    public function productform()
    {

        $category = Category::select('categoryTitle')->get();
        $products = Product::all();
        return view("admin.product.create_product", compact("category", "products"));
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

    public function edit($id)
    {
        $category = Product::find($id);
        return response()->json($category);
    }

    public function update(Request $request, $id)
    {
        $model = \App\Models\Product::class;

        $validation_rules = [
            'productcategories'   => 'required|string',
            'productname'         => 'required|string|max:255',
            'productdescription'  => 'required|string',
            'price'               => 'required|numeric',
            'saleprice'           => 'nullable|numeric',
            'image'               => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'icon'                => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ];

        $paths = [
            'icon'  => 'product/icon',
            'image' => 'product/image',
        ];

        $updated = $this->service->update($request, $validation_rules, $model, $id, $paths);

        if ($updated) {
            return response()->json(['status' => true, 'message' => 'Category Updated Successfully']);
        }

        return response()->json(['status' => false, 'message' => 'Update Failed']);
    }
}
