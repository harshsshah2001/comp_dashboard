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
    public function categoryform(Request $request)
    {
        // Fetch categories
        $categories = Category::all();

        // If AJAX request → send JSON for DataTables
        if ($request->ajax()) {
            return response()->json([
                'data' => $categories
            ]);
        }

        // For dropdown only (title)
        $categoryTitles = Category::select('categoryTitle')->get();

        // Normal HTTP request → return view
        return view('admin.category.create_category', compact('categoryTitles'));
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


        $result = $this->service->AddData($request);

        if ($result) {
            return response()->json(['status' => true, 'message' => 'Category Added Successfully']);
        }

        return response()->json(['status' => false, 'message' => 'Something went wrong']);
    }

    public function delete($id)
    {
        $result = $this->service->deleteCategory($id);

        if ($result) {
            return response()->json(['status' => true, 'message' => 'Category Deleted Successfully']);
        }

        return response()->json(['status' => false, 'message' => 'Delete Failed']);
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return response()->json($category);
    }

    public function update(Request $request, $id)
    {
        $result = $this->service->updateCategory($request, $id);

        if ($result) {
            return response()->json(['status' => true, 'message' => 'Category Updated Successfully']);
        }

        return response()->json(['status' => false, 'message' => 'Update Failed']);
    }
}
