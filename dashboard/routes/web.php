<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    // Category Routes
    Route::get('category', [App\Http\Controllers\Admin\CategoryController::class, 'index']);
    Route::get('add-category', [App\Http\Controllers\Admin\CategoryController::class, 'create']);
    Route::post('add-category', [App\Http\Controllers\Admin\CategoryController::class, 'store']);
    Route::get('edit-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit']);
    Route::put('update-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'update']);
    Route::get('delete-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy']);
    Route::get('restore-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'restore']);


Route::get('posts', [App\Http\Controllers\Admin\PostController::class, 'index']);
Route::get('add-post', [App\Http\Controllers\Admin\PostController::class, 'create']);
Route::post('add-post',[ App\Http\Controllers\Admin\PostController::class,'store']);
Route::get('post/{post_id}', [App\Http\Controllers\Admin\PostController::class, 'edit']);
Route::put('update-post/{post_id}', [App\Http\Controllers\Admin\PostController::class, 'update']);
Route::get('delete-post/{post_id}', [App\Http\Controllers\Admin\PostController::class, 'destroy']);

Route::get('users',[App\Http\Controllers\Admin\UserController::class,'index']);
Route::get('user/{user_id}',[App\Http\Controllers\Admin\UserController::class,'edit']);
Route::put('update-user/{user_id}',[App\Http\Controllers\Admin\UserController::class,'update']);



Route::get('order', [App\Http\Controllers\Admin\OrderController::class, 'index']);
Route::get('add-order', [App\Http\Controllers\Admin\OrderController::class, 'create']);
Route::post('add-order', [App\Http\Controllers\Admin\OrderController::class, 'store']);
Route::get('edit-order/{order_id}', [App\Http\Controllers\Admin\OrderController::class, 'edit']);
Route::put('update-order/{order_id}', [App\Http\Controllers\Admin\OrderController::class, 'update']);
Route::get('delete-order/{order_id}', [App\Http\Controllers\Admin\OrderController::class, 'destroy']);
Route::get('restore-order/{order_id}', [App\Http\Controllers\Admin\OrderController::class, 'restore']);



Route::get('products', [App\Http\Controllers\Admin\ProductController::class, 'index']);
Route::get('add-product', [App\Http\Controllers\Admin\ProductController::class, 'create']);
Route::post('add-product', [App\Http\Controllers\Admin\ProductController::class, 'store']);
Route::get('edit-product/{product_id}', [App\Http\Controllers\Admin\ProductController::class, 'edit']);
Route::put('update-product/{product_id}', [App\Http\Controllers\Admin\ProductController::class, 'update']);
Route::delete('delete-product/{product_id}', [App\Http\Controllers\Admin\ProductController::class, 'destroy']);  // Corrected to DELETE
Route::get('restore-product/{product_id}', [App\Http\Controllers\Admin\ProductController::class, 'restore']);

Route::get('coupons', [App\Http\Controllers\Admin\CouponController::class, 'index']);
Route::get('add-coupon', [App\Http\Controllers\Admin\CouponController::class, 'create']);
Route::post('add-coupon', [App\Http\Controllers\Admin\CouponController::class, 'store']);
Route::get('edit-coupon/{coupon_id}', [App\Http\Controllers\Admin\CouponController::class, 'edit']);
Route::put('update-coupon/{coupon_id}', [App\Http\Controllers\Admin\CouponController::class, 'update']);
Route::get('delete-coupon/{coupon_id}', [App\Http\Controllers\Admin\CouponController::class, 'destroy']);
Route::get('restore-coupon/{coupon_id}', [App\Http\Controllers\Admin\CouponController::class, 'restore']);

Route::get('wishlist', [App\Http\Controllers\Admin\WishlistController::class, 'index']);
Route::get('add-wishlist', [App\Http\Controllers\Admin\WishlistController::class, 'create']);
Route::post('add-wishlist', [App\Http\Controllers\Admin\WishlistController::class, 'store']);
Route::get('edit-wishlist/{wishlist_id}', [App\Http\Controllers\Admin\WishlistController::class, 'edit']);
Route::put('update-wishlist/{wishlist_id}', [App\Http\Controllers\Admin\WishlistController::class, 'update']);
Route::get('delete-wishlist/{wishlist_id}', [App\Http\Controllers\Admin\WishlistController::class, 'destroy']);
Route::get('restore-wishlist/{wishlist_id}', [App\Http\Controllers\Admin\WishlistController::class, 'restore']);


Route::get('customer', [App\Http\Controllers\Admin\CustomerController::class, 'index']);
Route::get('add-customer', [App\Http\Controllers\Admin\CustomerController::class, 'create']);
Route::post('add-customer', [App\Http\Controllers\Admin\CustomerController::class, 'store']);
Route::get('edit-customer/{customer_id}', [App\Http\Controllers\Admin\CustomerController::class, 'edit']);
Route::put('update-customer/{customer_id}', [App\Http\Controllers\Admin\CustomerController::class, 'update']);
Route::get('delete-customer/{customer_id}', [App\Http\Controllers\Admin\CustomerController::class, 'destroy']);
Route::get('restore-customer/{customer_id}', [App\Http\Controllers\Admin\CustomerController::class, 'restore']);


Route::get('message', [App\Http\Controllers\Admin\MessageController::class, 'index']);
Route::get('add-message', [App\Http\Controllers\Admin\MessageController::class, 'create']);
Route::post('add-message', [App\Http\Controllers\Admin\MessageController::class, 'store']);
Route::get('edit-message/{message_id}', [App\Http\Controllers\Admin\MessageController::class, 'edit']);
Route::put('update-message/{message_id}', [App\Http\Controllers\Admin\MessageController::class, 'update']);
Route::get('delete-message/{message_id}', [App\Http\Controllers\Admin\MessageController::class, 'destroy']);
Route::get('restore-message/{message_id}', [App\Http\Controllers\Admin\MessageController::class, 'restore']);


Route::get('testimonial', [App\Http\Controllers\Admin\TestimonialController::class, 'index']);
Route::get('add-testimonial', [App\Http\Controllers\Admin\TestimonialController ::class, 'create']);
Route::post('add-testimonial', [App\Http\Controllers\Admin\TestimonialController ::class, 'store']);
Route::get('edit-testimonial/{testimonial_id}', [App\Http\Controllers\Admin\TestimonialController ::class, 'edit']);
Route::put('update-testimonial/{testimonial_id}', [App\Http\Controllers\Admin\TestimonialController ::class, 'update']);
Route::get('delete-testimonial/{testimonial_id}', [App\Http\Controllers\Admin\TestimonialController ::class, 'destroy']);
Route::get('restore-testimonial/{testimonial_id}', [App\Http\Controllers\Admin\TestimonialController ::class, 'restore']);




Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');



});

