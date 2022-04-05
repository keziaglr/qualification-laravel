<?php
namespace App\Http\Controllers;
use App\Models\Product;
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

//User section
Route::get('/', [UserController::class, 'showLoginForm']);

Route::get('/login', [UserController::class, 'showLoginForm']);
Route::post('/login', [UserController::class, 'login']);

Route::get('/register', [UserController::class, 'showRegisterForm']);
Route::post('/register', [UserController::class, 'register']);

Route::group(['middleware'=>['login']], function() {
    Route::get('logout', 'App\Http\Controllers\UserController@logout');

    //Flower section
    Route::get('home', [ProductController::class, 'index']);

    Route::get('product/insert', [ProductController::class, 'showInsertForm']);
    Route::post('product/insert', [ProductController::class, 'insert']);

    Route::get('product/update/{id}', [ProductController::class, 'showUpdateForm']);
    Route::post('product/update/{id}', [ProductController::class, 'update']);

    Route::get('product/delete/{id}', [ProductController::class, 'delete']);

    Route::get('product/detail/{id}', [ProductController::class, 'showDetail']);

    Route::get('wishlist/insert/{id}', [WishlistController::class, 'addToWishlist']);
    Route::get('wishlist/remove/{id}', [WishlistController::class, 'removeFromWishlist']);

    Route::get('wishlist', [WishlistController::class, 'index']);
});
