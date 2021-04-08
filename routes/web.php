<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\CategoryProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Users\UsersDashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

//user
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/user/dashboard', [ UsersDashboardController::class,'render'])->name('users.dashboard');
});

//Admin
Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function () {
    Route::get('/admin/dashboard', [ AdminDashboardController::class, 'render'])->name('admin.dashboard');
    //Category
    Route::get('/admin/category-product', [CategoryProductController::class, 'AllCategoryProduct'])->name('category.allcategoryproduct');
    Route::get('/admin/add-category-product', [CategoryProductController::class, 'AddCategoryProduct'])->name('category.addcategoryproduct');
    Route::post('admin/add-submit-category', [CategoryProductController::class, 'AddSubmitCategory'])->name('category.addsubmitcategory');
    Route::get('/delete-category-product/{id}', [CategoryProductController::class, 'DeleteCategoryProduct'])->name('category.deletecategory');
    Route::get('/edit-category-product/{id}', [CategoryProductController::class, 'EditCategoryProduct'])->name('category.editcategoryproduct');
    Route::post('update-category-product', [CategoryProductController::class, 'UpdateCategoryProduct'])->name('category.updatecategoryproduct');
    //Product
    Route::get('/admin/product', [ProductController::class, 'AllProduct'])->name('product.allproduct');
    Route::get('/admin-add-product',[ProductController::class,'AddProduct'])->name('product.addproduct');
    Route::post('/admin/add-submit-product', [ProductController::class,'AddSubmitProduct'])->name('product.addsubmitproduct');
    Route::get('/admin/edit-product/{id}', [ProductController::class, 'EditProduct'])->name('product.editproduct');
    Route::post('/admin/update-product', [ProductController::class, 'UpdateProduct'])->name('product.updateproduct');
    Route::get('/admin/delete-product/{id}', [ProductController::class, 'DeleteProduct'])->name('product.deleteproduct');

    Route::resource('categorys', CategoryController::class);

});

//Route::get('/admin/category', [CategoryController::class, 'index'])->name('admin.categorylist');

Route::middleware(['auth'])->group(function (){
    //admin
});
