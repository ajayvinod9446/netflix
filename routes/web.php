<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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

// =======================================Start Login Route====================
Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('adminHome', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');


// =======================================End Login Route====================

// =======================================Start Admin Route====================

Route::get('/addLanguage', [AdminController::class, 'IndexLanguage'])->name('IndexLanguage');

Route::get('/addGenres', [AdminController::class, 'IndexGenres'])->name('IndexGenres');

Route::post('/add-language', [AdminController::class, 'store'])->name('store-language');

Route::post('/add-genres', [AdminController::class, 'storeGeners'])->name('store-genres');


Route::get('/addMovies', [AdminController::class, 'addMoviesIndex'])->name('addMoviesIndex');

Route::post('/add-Movie', [AdminController::class, 'storeMovie'])->name('store-Movie');

// =======================================End Admin Route====================
