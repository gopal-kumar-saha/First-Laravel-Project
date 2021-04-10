<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FrontendController;

use App\Http\Controllers\CategoryController;

use App\Http\Controllers\SubcategoryController;

use App\Http\Controllers\ProductController;

use App\Http\Controllers\ContactController;

use App\Http\Controllers\SettingController;

use App\Http\Controllers\CartController;

use App\Http\Controllers\VerifyController;

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


 

//                  FrontendController controller           //////////////////////////

Route::get('/', [FrontendController::class, 'home']); 

Route::get('product/info/{product_id}', [FrontendController::class, 'product_info'])->name('ProductInfo');

Route::get('shop', [FrontendController::class, 'shop'])->name('shop');

Route::get('categoriwise/{category_id}', [FrontendController::class, 'categoriwise'])->name('categoriwise');


//                  SettingController controller           //////////////////////////

Route::get('setting', [SettingController::class, 'setting'])->name('setting');
Route::post('setting/post', [SettingController::class, 'setting_post'])->name('SettingPost'); 

Route::get('tohoney_login', [SettingController::class, 'login'])->name('TohoneyLogin');


//                  Contact controller           //////////////////////////

Route::get('contact', [App\Http\Controllers\ContactController::class, 'contact']);
Route::post('contact/info', [App\Http\Controllers\ContactController::class, 'contact_info'])->name('ContactInfo');
Route::post('contact/mail', [App\Http\Controllers\ContactController::class, 'contact_mail'])->name('ContactMail');





//                  Category controller           //////////////////////////

Route::get('category', [CategoryController::class, 'category']);      //use controller

Route::post('category/post', [CategoryController::class, 'category_post']);      //use controller

Route::get('category/delete/{category_id}', [CategoryController::class, 'category_delete']);      //use controller

Route::get('category/all/delete', [CategoryController::class, 'category_all_delete']);      //use controller

Route::get('category/edit/{category_id}', [CategoryController::class, 'category_edit']);      //use controller

Route::post('category/post/edit', [CategoryController::class, 'category_edit_post']);      //use controller



Route::get('category/restore/{category_id}', [CategoryController::class, 'category_restore']);      //use controller


Route::get('category/force_delete/{category_id}', [CategoryController::class, 'category_force_delete']);      //use controller

Route::post('category/check/delete', [CategoryController::class, 'category_check_delete'])->name('check_delete');      //use controller

     //use controller



//                  Sub-Category controller           //////////////////////////

Route::get('subcategory', [SubcategoryController::class, 'sub_category'])->name('SubCategory');  
Route::post('subcategory/post', [SubcategoryController::class, 'subcategory_post'])->name('SubcategoryPosT'); 




Route::get('verify', [VerifyController::class, 'getVerify'])->name('getverify'); 
Route::post('verify', [VerifyController::class, 'postVerify'])->name('verify'); 





//                  Cart controller           //////////////////////////

Route::post('add/to/cart/{product_id}', [CartController::class, 'add_to_cart'])->name('AddToCart');


















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

Route::post('product/edit/post/{product_id}', [ProductController::class, 'product_edit_post'])->name('ProductEditPosT');

Route::get('restore/product/{product_id}', [ProductController::class, 'restore_product'])->name('restoreProduct');

Route::get('force_delete/product/{product_id}', [ProductController::class, 'force_delete_product'])->name('forceDelete');


