<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FrontendController;

use App\Http\Controllers\CategoryController;

use App\Http\Controllers\ProductController;

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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('about', function () {
    echo "Hello world";
});

// Route::get('contact', function () {
//     echo "Hello world";
// });

Route::get('/', [App\Http\Controllers\FrontendController::class, 'home']);      //make forntend controller

Route::get('contact', [App\Http\Controllers\FrontendController::class, 'contact']);      //make forntend controller

Route::get('product/info/{product_id}', [App\Http\Controllers\FrontendController::class, 'product_info'])->name('ProductInfo');

Route::post('contact/info', [App\Http\Controllers\FrontendController::class, 'contact_info']);      //make forntend controller











Route::get('category', [CategoryController::class, 'category']);      //use controller

Route::post('category/post', [CategoryController::class, 'category_post']);      //use controller

Route::get('category/delete/{category_id}', [CategoryController::class, 'category_delete']);      //use controller

Route::get('category/all/delete', [CategoryController::class, 'category_all_delete']);      //use controller

Route::get('category/edit/{category_id}', [CategoryController::class, 'category_edit']);      //use controller

Route::post('category/post/edit', [CategoryController::class, 'category_edit_post']);      //use controller



Route::get('category/restore/{category_id}', [CategoryController::class, 'category_restore']);      //use controller


Route::get('category/force_delete/{category_id}', [CategoryController::class, 'category_force_delete']);      //use controller

Route::post('category/check/delete', [CategoryController::class, 'category_check_delete'])->name('check_delete');      //use controller


Route::get('service', function () {
    $name = "Dipu Saha";
    return view('service', compact('name'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// ProductController link start /////////////////////////////

Route::get('product', [ProductController::class, 'product'])->name('ProducT'); 

Route::post('product/post', [ProductController::class, 'product_post'])->name('ProductPosT'); 

Route::get('edit/product/{product_id}', [ProductController::class, 'edit_product']); 

Route::get('delete/product/{product_id}', [ProductController::class, 'delete_product']); 

Route::post('product/edit/post', [ProductController::class, 'product_edit_post'])->name('ProductEditPosT');

Route::get('restore/product/{product_id}', [ProductController::class, 'restore_product'])->name('restoreProduct');

Route::get('force_delete/product/{product_id}', [ProductController::class, 'force_delete_product'])->name('forceDelete');



