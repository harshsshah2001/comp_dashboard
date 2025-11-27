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

    public function list(Request $request)
    {
        $columns = ['id', 'category', 'productname', 'image', 'icon', 'price', 'saleprice', 'productdescription'];

        $length = $request->input('length');
        $start  = $request->input('start');
        $search = $request->input('search.value');

        $query = Product::query();

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('productname', 'like', "%$search%")
                    ->orWhere('category', 'like', "%$search%");
            });
        }

        $totalData = Product::count();
        $totalFiltered = $query->count();

        $products = $query->offset($start)
            ->limit($length)
            ->orderBy('id', 'DESC')
            ->get();

        return response()->json([
            'draw'            => intval($request->input('draw')),
            'recordsTotal'    => $totalData,
            'recordsFiltered' => $totalFiltered,
            'data'            => $products
        ]);
    }


    public function productform()
    {

        $category = Category::select('categoryTitle')->get();
        $categories = Category::all();

        return view("admin.product.create_product", compact("category", "categories"));
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
        $model = Product::class;

        $validation_rules = [
            'category'           => 'required|string',
            'productname'        => 'required|string|max:255',
            'productdescription' => 'required|string',
            'price'              => 'required|numeric',
            'saleprice'          => 'nullable|numeric',
            'image'              => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'icon'               => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ];

        $paths = [
            'icon'  => 'product/icon',
            'image' => 'product/image',
        ];

        $updated = $this->service->update($request, $validation_rules, $model, $id, $paths);

        if ($updated) {
            return response()->json(['status' => true, 'message' => 'Product Updated Successfully']);
        }

        return response()->json(['status' => false, 'message' => 'Update Failed']);
    }

    public function delete($id)
    {
        $model = \App\Models\Product::class;

        // Fields that contain image paths in DB
        $image_fields = ['image', 'icon'];

        return $this->service->delete($model, $id, $image_fields);
    }
}
