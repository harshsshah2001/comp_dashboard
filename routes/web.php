<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

// Admin Login Routes
Route::get('/loginform', [AdminController::class, 'signinform'])->name('loginform');
Route::post('/login', [AdminController::class, 'login'])->name('admin.login.post');

// Admin Dashboard
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

// Category Routes
Route::get('/category/create', [CategoryController::class, 'categoryform'])->name('category.create');
Route::post('/admin/category/store', [CategoryController::class, 'store'])->name('category.store');
Route::delete('/admin/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
Route::get('/admin/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/admin/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
