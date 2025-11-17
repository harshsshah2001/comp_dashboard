<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AdminService;
use App\Models\Category;

class CategoryController extends Controller
{

     protected $service;

     public function __construct(AdminService $service)
    {
        $this->service = $service;
    }
    public function categoryform(){

        $categories = Category::select('categoryTitle')->get();
        return view('admin.category.create_category', compact('categories'));
    }

    public function store(Request $request)
{
    $request->validate([
    'parentCategory' => 'nullable|string',
    'categoryTitle'  => 'nullable|string|max:255',
    'image'          => 'nullable|image',
    'icon'           => 'nullable|image',
    'categoryDescription' => 'nullable|string',
]);


    $result = $this->service->addCategory($request);

    if ($result) {
        return response()->json(['status' => true, 'message' => 'Category Added Successfully']);
    }

    return response()->json(['status' => false, 'message' => 'Something went wrong']);
}
}
