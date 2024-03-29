<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookReviewsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

//Auth routes
Route::middleware('auth')->group(function () {
    Route::get('/users/list', [RegisteredUserController::class, 'showUsers'])->name('users.list');
    Route::get('/users/{id}/edit', [ProfileController::class, 'edit'])->name('users.edit');
    Route::post('/users/{id}/edit', [ProfileController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [ProfileController::class, 'destroy'])->name('users.destroy');
    //Books routes
    Route::resource('/books', BookController::class);
    //Sort routes
    Route::get('/sort-by/', [BookController::class, 'sortBy'])->name('books.sortBy');

    //Reviews routes
    Route::post('/book/{id}/review', [BookReviewsController::class, 'store'])->name('reviews.store');
    //Cart routes
    Route::get('/cart-items/', [CartController::class, 'index'])->name('cart.index');
    Route::get('/cart-items/{id}', [CartController::class, 'show'])->name('cart.show');
    Route::post('/cart-items/{id}', [CartController::class, 'store'])->name('cart.store');
    Route::delete('/cart-items/{id}', [CartController::class, 'destroy'])->name('cart.destroy');

    Route::get('/cart-items/add/{id}', [CartController::class, 'addQuantity'])->name('cart.addQuantity');
    Route::get('/cart-item/remove/{id}', [CartController::class, 'removeQuantity'])->name('cart.removeQuantity');

//    Route::get('/my-books',[DashboardController::class,'index'])->name('dashboard.index');
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard.index');

});
require __DIR__ . '/auth.php';
