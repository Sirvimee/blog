<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\PublicController;
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

Route::get('/', [PublicController::class, 'home']); // '\App\Http\Controllers\PublicController'
Route::get('/posts', [PublicController::class, 'posts']); // '\App\Http\Controllers\PublicController'
Route::get('/admin/posts', [PostController::class,'index'])->name('admin.posts.index');
Route::get('/admin/posts/create', [PostController::class,'create'])->name('admin.posts.create');
Route::post('/admin/posts', [PostController::class,'store'])->name('admin.posts.store');
