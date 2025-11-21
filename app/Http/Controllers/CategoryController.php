<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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

    public function titles()
    {
        return Category::select('categoryTitle')->get();
    }


    public function store(Request $request)
    {
        $model = \App\Models\Category::class;

        $validation_rules = [
            'parentCategory' => 'nullable|string',
            'categoryTitle'  => 'required|string|max:255|min:3',
            'image'          => 'required|nullable|image',
            'icon'           => 'nullable|image',
            'categoryDescription' => 'required|string',
        ];

        $validator = Validator::make($request->all(), $validation_rules);

        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => 'Validation failed',
                'errors'  => $validator->errors()
            ], 422);
        }

        $image_paths = [
            'icon'  => 'categories/icons',
            'image' => 'categories/images'
        ];

        return $this->service->store(
            $request,
            $validation_rules,
            $model,
            $image_paths
        );
    }



    public function edit($id)
    {
        $category = Category::find($id);
        return response()->json($category);
    }

    public function update(Request $request, $id)
    {
        $model = \App\Models\Category::class;

        $validation_rules = [
            'parentCategory' => 'nullable|string',
            'categoryTitle'  => 'required|nullable|string|max:255',
            'image'          => 'required|nullable|image',
            'icon'           => 'nullable|image',
            'categoryDescription' => 'required|nullable|string',
        ];

        $validator = Validator::make($request->all(), $validation_rules);

        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => 'Validation failed',
                'errors'  => $validator->errors()
            ], 422);
        }

        $paths = [
            'image' => 'categories',
            'icon'  => 'category_icons'
        ];

        $updated = $this->service->update($request, $validation_rules, $model, $id, $paths);

        if ($updated) {
            return response()->json(['status' => true, 'message' => 'Category Updated Successfully']);
        }

        return response()->json(['status' => false, 'message' => 'Update Failed']);
    }

    public function delete($id)
    {
        $model = \App\Models\Category::class;

        // Fields that contain image paths in DB
        $image_fields = ['image', 'icon'];

        return $this->service->delete($model, $id, $image_fields);
    }

    public function chart()
    {
        // Fetch category titles & count how many are in each parent category
        $chartData = Category::select('parentCategory')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('parentCategory')
            ->get();

        return view('admin.category.chart', compact('chartData'));
    }
}
