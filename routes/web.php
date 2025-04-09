<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MyPlaceController;
use App\Http\Controllers\Admin\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return 'aaaaaaaaaaaaaa';
});
Route::get('/my-page',[MyPlaceController::class,'index']);

// Route::get('/posts', [PostController::class,'index'])->name('post.index');
// Route::get('/posts/create', [PostController::class,'create'])->name('post.create');
// Route::post('/posts', [PostController::class,'store'])->name('post.store');
// Route::get('/posts/{post}', [PostController::class,'show'])->name('post.show');
// Route::get('/posts/{post}/edit', [PostController::class,'edit'])->name('post.edit');
// Route::patch('/posts/{post}', [PostController::class,'update'])->name('post.update');
// Route::delete('/posts/{post}', [PostController::class,'destroy'])->name('post.delete');

Route::namespace('App\Http\Controllers\Post')->group(function(){
    Route::get('/posts','IndexController')->name('post.index');
    Route::get('/posts/create','CreateController')->name('post.create');
    Route::post('/post','StoreController')->name('post.store');
    Route::get('/post{post}','ShowController')->name('post.show');
    Route::get('/post{post}/edit','EditController')->name('post.edit');
    Route::patch('/post{post}','UpdateController')->name('post.update');
    Route::delete('/post{post}','DestroyController')->name('post.delete');
});

Route::namespace('App\Http\Controllers\Admin')->prefix('admin')->group(function(){
    Route::namespace('Post')->group(function(){
        Route::get('/post', 'IndexController')->name('admin.post.index');
    });
});


Route::get('/main', [MainController::class,'index'])->name('main.index');

Route::get('/contacts', [ContactController::class,'index'])->name('contact.index');
Route::get('/about', [AboutController::class,'index'])->name('about.index');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
