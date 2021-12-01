<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\BookController;
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
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//Auth routes
Route::middleware('auth')->group(function () {
    Route::get('/users/list', [RegisteredUserController::class, 'showUsers'])->name('users.list');
    Route::get('/user/{id}/edit', [ProfileController::class, 'edit'])->name('users.edit');
    Route::post('/user/{id}/edit', [ProfileController::class, 'update'])->name('users.update');
    Route::delete('/user/{id}', [ProfileController::class, 'destroy'])->name('users.destroy');
//    //Books routes
    Route::resource('books', BookController::class);

});


//Route::get('/users/list', [RegisteredUserController::class, 'showUsers']
//)->middleware(['auth'])->name('users.list');

//Route::get('/user/{id}/edit', [ProfileController::class, 'edit']
//)->middleware(['auth'])->name('users.edit');
//
//Route::post('/user/{id}/edit', [ProfileController::class, 'update']
//)->middleware(['auth'])->name('users.update');
//
//Route::delete('/user/{id}', [ProfileController::class, 'destroy']
//)->middleware(['auth'])->name('users.destroy');

require __DIR__ . '/auth.php';
