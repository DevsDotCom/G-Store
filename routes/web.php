<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/', [App\Http\Controllers\Admin\AdminController::class, 'index']);

Route::get('/admin/Product', [App\Http\Controllers\Admin\ProductController::class, 'index']);
Route::get('/admin/addProduct', [App\Http\Controllers\Admin\ProductController::class, 'add']);
Route::post('/admin/addProduct', [App\Http\Controllers\Admin\ProductController::class, 'insert']);

Route::get('/admin/Category', [App\Http\Controllers\Admin\CategoryController::class, 'index']);
Route::post('/admin/Category', [App\Http\Controllers\Admin\CategoryController::class, 'insert']);
Route::get('/admin/editCategory/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit']);
Route::post('/admin/updateCategory', [App\Http\Controllers\Admin\CategoryController::class, 'update']);
Route::get('/admin/deleteCategory/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'delete']);

Route::get('/admin/Brand', [App\Http\Controllers\Admin\BrandController::class, 'index']);
Route::post('/admin/Brand', [App\Http\Controllers\Admin\BrandController::class, 'insert']);
Route::get('/admin/editBrand/{id}', [App\Http\Controllers\Admin\BrandController::class, 'edit']);
Route::post('/admin/updateBrand', [App\Http\Controllers\Admin\BrandController::class, 'update']);
Route::get('/admin/deleteBrand/{id}', [App\Http\Controllers\Admin\BrandController::class, 'delete']);
