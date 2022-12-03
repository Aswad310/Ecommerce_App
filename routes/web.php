<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FrontendController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\CountryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

/**
 * Landing Page Routes
 */
// Show Landing Page view
Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index']);
Route::get('/category', [App\Http\Controllers\Frontend\FrontendController::class, 'category']);
Route::get('/view-category/{slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'viewProductsByCategory']);
Route::get('/category/{cate_slug}/{prod_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'productView']);

Auth::routes();

/**
 * CART Routes
 */
// Add-to-cart Route
Route::post('/add-to-cart', [CartController::class, 'addProduct']);
// Show cart page Route
Route::get('/cart', [CartController::class, 'viewCart']);
// Delete cart item Route
Route::post('/delete-cart-item', [CartController::class, 'deleteCartItem']);
// Update cart quantity Route
Route::post('/update-cart', [CartController::class, 'updateCartQty']);

/**
 * Checkout Routes
 */
// show checkout page Route
Route::get('/checkout', [CheckoutController::class, 'index']);
Route::post('/place-order', [CheckoutController::class, 'placeOrder']);


/**
 * Extra Routes
 */
// Show Home view
Route::get('/home', [HomeController::class, 'index'])->name('home');

/**
 * Admin Dashboard Routes
 */
// Admin Routes
Route::middleware(['auth', 'isAdmin'])->group(function (){
    // Show Dashboard view
    Route::get('/dashboard', [FrontendController::class, 'index']);

/*
 * Category Routes
 */
    // Show Categories view
    Route::get('/categories', [CategoryController::class, 'index']);
    // Show Add Categories form
    Route::get('/add-category', [CategoryController::class, 'create']);
    // Create Category
    Route::post('/insert-category', [CategoryController::class, 'store']);
    // Show Edit Category form
    Route::get('/edit-category/{id}', [CategoryController::class, 'edit']);
    // Update Category
    Route::put('/update-category/{id}', [CategoryController::class, 'update']);
    // Delete Category
    Route::delete('/delete-category/{id}', [CategoryController::class, 'destroy']);

/*
* Product Routes
*/
    // Show Products view
    Route::get('/products', [ProductController::class, 'index']);
    // Show Add Products form
    Route::get('/add-product', [ProductController::class, 'create']);
    // Create Product
    Route::post('/insert-product', [ProductController::class, 'store']);
    // Show Edit Product form
    Route::get('/edit-product/{id}', [ProductController::class, 'edit']);
    // Update Product
    Route::put('/update-product/{id}', [ProductController::class, 'update']);
    // Delete Product
    Route::delete('/delete-product/{id}', [ProductController::class, 'destroy']);
});
