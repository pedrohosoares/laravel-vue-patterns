<?php

use App\Http\Controllers\Web\CategoryController;
use App\Http\Controllers\Web\PostController;
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
    return view('home');
})->name('home');
Route::get('/posts/{id}',[PostController::class,'show'])->name('posts.show');
Route::get('/categories/{id}',[CategoryController::class,'show'])->name('categories.show');
