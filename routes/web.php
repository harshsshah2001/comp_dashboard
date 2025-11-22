<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RolesPermission;

Route::middleware('web')->group(function () {

    Route::get('/', function () {
        return view('welcome');
    });

    // Admin Login Routes
    Route::get('/loginform', [AdminController::class, 'signinform'])->name('loginform');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login.post');

    // Admin Dashboard
    Route::middleware('admin.auth')->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');


        // Category Routes
        Route::get('/category/create', [CategoryController::class, 'categoryform'])->name('category.create');
        Route::post('/admin/category/store', [CategoryController::class, 'store'])->name('category.store');
        Route::delete('/admin/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
        Route::get('/admin/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::post('/admin/category/update/{id}', [CategoryController::class, 'update']);

        //for refresh a category dropdown
        Route::get('/category/titles', [CategoryController::class, 'titles'])->name('category.titles');

        Route::get('/admin/category/chart', [CategoryController::class, 'chart'])->name('category.chart');

        // Product Routes
        Route::get('/product/create', [ProductController::class, 'productform'])->name('product.create');
        Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
        Route::get('/admin/product/edit/{id}', [ProductController::class, 'edit']);
        Route::post('/admin/product/update/{id}', [ProductController::class, 'update']);

        // Roles and permissions routes
        Route::get('/roles', [RolesPermission::class, 'roles'])->name('roles');
        Route::post('/roles', [RolesPermission::class, 'rolesubmit'])->name('rolesubmit');
        Route::get('/roles/edit/{id}', [RolesPermission::class, 'edit'])->name('roleedit');
        Route::post('/roles/update/{id}', [RolesPermission::class, 'update']);

        Route::delete('roles/delete/{id}', [RolesPermission::class, 'roledelete'])->name('roledelete');

        Route::get('/permissions', [RolesPermission::class, 'permissions'])->name('permissions');
        Route::get('/role-permission-list', [RolesPermission::class, 'role_permission_list'])->name('role_permission_list');
        Route::get('/user-lists', [RolesPermission::class, 'user_list'])->name('userlist');
    });
});
