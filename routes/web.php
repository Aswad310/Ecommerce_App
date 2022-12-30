<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Acheckoutdmin\FrontendController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\WishlistController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\HomeController;

/**
 * Landing Page Routes
 */
    Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index']);
    Route::get('/category', [App\Http\Controllers\Frontend\FrontendController::class, 'category']);
    Route::get('/view-category/{slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'viewProductsByCategory']);
    Route::get('/category/{cate_slug}/{prod_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'productView']);

    Route::get('/product-list', [App\Http\Controllers\Frontend\FrontendController::class, 'productListAjax']);
    Route::post('/searchproduct', [App\Http\Controllers\Frontend\FrontendController::class, 'searchProduct']);

Auth::routes([
    'verify' => true
]);

/**
 * CART and WISHLIST Routes
 */
    Route::post('/add-to-cart', [CartController::class, 'addProduct']);
    Route::get('/cart', [CartController::class, 'viewCart']);
    Route::post('/delete-cart-item', [CartController::class, 'deleteCartItem']);
    Route::post('/update-cart', [CartController::class, 'updateCartQty']);
    Route::get('/load-cart-count', [CartController::class, 'cartCount']);
    Route::get('/load-wishlist-count', [WishlistController::class, 'wishlistCount']);
    Route::post('/add-to-wishlist', [WishlistController::class, 'add']);
    Route::post('/delete-wishlist-item', [WishlistController::class, 'deleteItem']);
    Route::middleware(['auth'])->group(function(){
        Route::get('/my-orders', [App\Http\Controllers\Frontend\UserController::class, 'index']);
        Route::get('/view-order/{id}', [App\Http\Controllers\Frontend\UserController::class, 'view']);
        Route::get('/wishlist', [WishlistController::class, 'index']);
    });

/**
 * Checkout Routes
 */
Route::get('/checkout', [CheckoutController::class, 'index']);
Route::post('/place-order', [CheckoutController::class, 'placeOrder']);
Route::view('/thanks', 'frontend.thanks');
/**
 * Extra Routes
 */
    Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('verified');
/**
 * Admin Dashboard Routes
 */
    Route::middleware(['auth', 'isAdmin'])->group(function () {
/*
 * Dashboard Routes
 */
        Route::get('/dashboard', [FrontendController::class, 'index']);
        Route::get('/dashboard', [DashboardController::class, 'count']);

/*
 * Category Routes
 */
        Route::get('/categories', [CategoryController::class, 'index']);
        Route::get('/add-category', [CategoryController::class, 'create']);
        Route::post('/insert-category', [CategoryController::class, 'store']);
        Route::get('/edit-category/{id}', [CategoryController::class, 'edit']);
        Route::put('/update-category/{id}', [CategoryController::class, 'update']);
        Route::delete('/delete-category/{id}', [CategoryController::class, 'destroy']);
/*
* Product Routes
*/
        Route::get('/products', [ProductController::class, 'index']);
        Route::get('/add-product', [ProductController::class, 'create']);
        Route::post('/insert-product', [ProductController::class, 'store']);
        Route::get('/edit-product/{id}', [ProductController::class, 'edit']);
        Route::put('/update-product/{id}', [ProductController::class, 'update']);
        Route::delete('/delete-product/{id}', [ProductController::class, 'destroy']);
/*
* User Routes
*/
        Route::get('/users', [UserController::class, 'users']);
        Route::get('/view-user/{id}', [UserController::class, 'view']);
/*
* Order Routes
*/
        Route::get('/orders', [OrderController::class, 'index']);
        Route::get('admin/view-order/{id}', [OrderController::class, 'view']);
        Route::put('update-order/{id}', [OrderController::class, 'updateOrder']);
        Route::get('order-history', [OrderController::class, 'orderHistory']);
});
