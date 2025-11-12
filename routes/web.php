<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');


Route::get('/signin',[AdminController::class,'signinform'])->name('signin');
Route::post('/login', [AdminController::class, 'login'])->name('admin.login.post');

