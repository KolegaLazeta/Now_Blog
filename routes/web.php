<?php

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
    return view('auth.log_reg');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/about', [\App\Http\Controllers\AboutUsController::class, 'index']);

//Cateories
Route::get('/categories', [\App\Http\Controllers\CategoryController::class, 'categories']);
Route::get('/categories/{id}', [\App\Http\Controllers\CategoryController::class, 'show']);
Route::get('/categories/{id}/{post_id}', [\App\Http\Controllers\CategoryController::class, 'post']);
//Posts
Route::get('/post/{post}', [\App\Http\Controllers\PostController::class, 'show']);

Auth::routes();
//Comments
Route::post('/comment', [\App\Http\Controllers\CommentController::class, 'store'])->name('comment.store');



Route::middleware(['roles:admin', 'auth'])->group(function () {

    Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin');
    Route::delete('/admin/delete/{user}', [\App\Http\Controllers\AdminController::class, 'destroy'])->name('user.destroy');
    Route::put('/admin/update/{user}', [\App\Http\Controllers\AdminController::class, 'update'])->name('user.update');

    //Categories
    Route::get('/admin/categories', [\App\Http\Controllers\CategoryController::class, 'index']);
    Route::get('/admin/create', [\App\Http\Controllers\CategoryController::class, 'create'])->name('create.category');
    Route::post('/admin/create', [\App\Http\Controllers\CategoryController::class, 'store']);
    Route::delete('/admin/category/delete/{category}', [\App\Http\Controllers\CategoryController::class, 'destroy'])->name('category.destroy');

    Route::get('/admin/comments', [\App\Http\Controllers\CommentController::class, 'comments']);
    Route::delete('/admin/comment/delete/{comment}', [\App\Http\Controllers\CommentController::class, 'destroy'])->name('comment.destroy');

    //Posts
    Route::get('/admin/post', [\App\Http\Controllers\PostController::class, 'index']);
    Route::get('/admin/posts/create', [\App\Http\Controllers\PostController::class, 'create']);
    Route::post('/admin', [\App\Http\Controllers\PostController::class, 'store']);
    Route::delete('/admin/post/delete/{post}',[\App\Http\Controllers\PostController::class, 'destroy'])->name('post.destroy');
});