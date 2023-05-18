<?php

use Illuminate\Support\Facades\Auth;
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

//Người dùng

//Home
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');
Route::get('/contact', 'App\Http\Controllers\HomeController@contact')->name('home.contact');

//Product
Route::get('/products', 'App\Http\Controllers\ProductController@index')->name('product.index');
Route::get('/products{id}', 'App\Http\Controllers\ProductController@show')->name('product.show');

//Blog
Route::get('/blog', 'App\Http\Controllers\BlogController@index')->name('blog.index');

//Cart
Route::get('/cart', 'App\Http\Controllers\CartController@index')->name('cart.index');
Route::get('cart/delete/{id}', 'App\Http\Controllers\CartController@delete')->name('cart.delete');
Route::post('cart/add/{id}', 'App\Http\Controllers\CartController@add')->name('cart.add');

//Checkout
Route::middleware('auth')->group(function () {
    Route::get('/cart/purchase', 'App\Http\Controllers\CartController@purchase')->name('cart.purchase');
});



//Admin
Route::middleware(['admin'])->group(function () {

    //Product
    Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name('admin.home.index');
    Route::get('/admin/products', 'App\Http\Controllers\Admin\AdminProductController@index')->name('admin.product.index');
    Route::post("/admin/products/store", "App\Http\Controllers\Admin\AdminProductController@store")->name("admin.product.store");
    Route::delete('/admin/products/{id}/delete', 'App\Http\Controllers\Admin\AdminProductController@delete')->name("admin.product.delete");
    Route::get('/admin/products/{id}/edit', 'App\Http\Controllers\Admin\AdminProductController@edit')->name("admin.product.edit");
    Route::put('/admin/products/{id}/update', 'App\Http\Controllers\Admin\AdminProductController@update')->name("admin.product.update");


    //Brand
    Route::get('/admin/brands', 'App\Http\Controllers\Admin\AdminBrandController@index')->name('admin.brand.index');
    Route::post("/admin/brands/store", "App\Http\Controllers\Admin\AdminBrandController@store")->name("admin.brand.store");
    Route::delete('/admin/brands/{id}/delete', 'App\Http\Controllers\Admin\AdminBrandController@delete')->name("admin.brand.delete");
    Route::get('/admin/brands/{id}/edit', 'App\Http\Controllers\Admin\AdminBrandController@edit')->name("admin.brand.edit");
    Route::put('/admin/brands/{id}/update', 'App\Http\Controllers\Admin\AdminBrandController@update')->name("admin.brand.update");

    //ProductType
    Route::get('/admin/productTypes', 'App\Http\Controllers\Admin\AdminProductTypeController@index')->name('admin.productType.index');
    Route::post("/admin/productTypes/store", "App\Http\Controllers\Admin\AdminProductTypeController@store")->name("admin.productType.store");
    Route::delete('/admin/productTypes/{id}/delete', 'App\Http\Controllers\Admin\AdminProductTypeController@delete')->name("admin.productType.delete");
    Route::get('/admin/productTypes/{id}/edit', 'App\Http\Controllers\Admin\AdminProductTypeController@edit')->name("admin.productType.edit");
    Route::put('/admin/productTypes/{id}/update', 'App\Http\Controllers\Admin\AdminProductTypeController@update')->name("admin.productType.update");

    //Blog
    Route::get('/admin/blogs', 'App\Http\Controllers\Admin\AdminBlogController@index')->name('admin.blog.index');
    Route::post("/admin/blogs/store", "App\Http\Controllers\Admin\AdminBlogController@store")->name("admin.blog.store");
    Route::delete('/admin/blogs/{id}/delete', 'App\Http\Controllers\Admin\AdminBlogController@delete')->name("admin.blog.delete");
    Route::get('/admin/blogs/{id}/edit', 'App\Http\Controllers\Admin\AdminBlogController@edit')->name("admin.blog.edit");
    Route::put('/admin/blogs/{id}/update', 'App\Http\Controllers\Admin\AdminBlogController@update')->name("admin.blog.update");

    //ProductImage
    Route::get('/admin/productImages', 'App\Http\Controllers\Admin\AdminProductImageController@index')->name('admin.productImage.index');
    Route::post("/admin/productImages/store", "App\Http\Controllers\Admin\AdminProductImageController@store")->name("admin.productImage.store");
    Route::delete('/admin/productImages/{id}/delete', 'App\Http\Controllers\Admin\AdminProductImageController@delete')->name("admin.productImage.delete");
    Route::get('/admin/productImages/{id}/edit', 'App\Http\Controllers\Admin\AdminProductImageController@edit')->name("admin.productImage.edit");
    Route::put('/admin/productImages/{id}/update', 'App\Http\Controllers\Admin\AdminProductImageController@update')->name("admin.productImage.update");

    //User
    Route::get('/admin/users', 'App\Http\Controllers\Admin\AdminUserController@index')->name('admin.user.index');
    Route::post("/admin/users/store", "App\Http\Controllers\Admin\AdminUserController@store")->name("admin.user.store");
    Route::delete('/admin/users/{id}/delete', 'App\Http\Controllers\Admin\AdminUserController@delete')->name("admin.user.delete");
    Route::get('/admin/users/{id}/edit', 'App\Http\Controllers\Admin\AdminUserController@edit')->name("admin.user.edit");
    Route::put('/admin/users/{id}/update', 'App\Http\Controllers\Admin\AdminUserController@update')->name("admin.user.update");

    //Cart
    Route::get('/admin/carts', 'App\Http\Controllers\Admin\AdminCartController@index')->name('admin.cart.index');
    Route::post("/admin/carts/store", "App\Http\Controllers\Admin\AdminCartController@store")->name("admin.cart.store");
    Route::delete('/admin/carts/{id}/delete', 'App\Http\Controllers\Admin\AdminCartController@delete')->name("admin.cart.delete");
    Route::get('/admin/carts/{id}/edit', 'App\Http\Controllers\Admin\AdminCartController@edit')->name("admin.cart.edit");
    Route::put('/admin/carts/{id}/update', 'App\Http\Controllers\Admin\AdminCartController@update')->name("admin.cart.update");

    //CartDetail
    Route::get('/admin/cartDetails', 'App\Http\Controllers\Admin\AdminCartDetailController@index')->name('admin.cartDetail.index');
    Route::post("/admin/cartDetails/store", "App\Http\Controllers\Admin\AdminCartDetailController@store")->name("admin.cartDetail.store");
    Route::delete('/admin/cartDetails/{id}/delete', 'App\Http\Controllers\Admin\AdminCartDetailController@delete')->name("admin.cartDetail.delete");
    Route::get('/admin/cartDetails/{id}/edit', 'App\Http\Controllers\Admin\AdminCartDetailController@edit')->name("admin.cartDetail.edit");
    Route::put('/admin/cartDetails/{id}/update', 'App\Http\Controllers\Admin\AdminCartDetailController@update')->name("admin.cartDetail.update");
});

Auth::routes();