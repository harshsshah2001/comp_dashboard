<?php

namespace App\Services;

use App\Repositories\AdminRepo;
use Illuminate\Support\Facades\Storage;

class AdminService
{
    protected $repo;

    public function __construct(AdminRepo $repo)
    {
        $this->repo = $repo;
    }

    public function AddData($request)
    {
        // Image Upload
        $image = null;
        $icon = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('categories', 'public');
        }

        if ($request->hasFile('icon')) {
            $icon = $request->file('icon')->store('category_icons', 'public');
        }

        $data = [
            'parentCategory'       => $request->parentCategory,
            'categoryTitle'        => $request->categoryTitle,
            'image'                => $image,
            'icon'                 => $icon,
            'categoryDescription'  => $request->categoryDescription,
            'created_at'           => now(),
            'updated_at'           => now(),
        ];


        return $this->repo->insertData('categories', $data);
    }

    public function deleteCategory($id)
    {
        return $this->repo->deleteData('categories', $id);
    }

    public function updateCategory($request, $id)
    {
        $data = [
            'parentCategory' => $request->parentCategory,
            'categoryTitle' => $request->categoryTitle,
            'categoryDescription' => $request->categoryDescription,
            'updated_at' => now(),
        ];

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('categories', 'public');
        }

        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('category_icons', 'public');
        }

        return $this->repo->updateData('categories', $id, $data);
    }
}
