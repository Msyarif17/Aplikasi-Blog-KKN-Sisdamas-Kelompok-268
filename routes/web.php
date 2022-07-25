<?php

use App\Http\Controllers\Frontend\HomeController;
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



Route::get('/',[HomeController::class, 'index'])->name('home');
Route::get('/about',[AboutController::class, 'about'])->name('about');
Route::get('/contact',[ContactController::class, 'contact'])->name('contact');
Route::prefix('blog')->name('blog.')->group(function(){
    Route::get('/',[BlogController::class, 'blog'])->name('index');
    Route::get('/{slug}',[BlogController::class, 'blog_detail'])->name('detail');
});
Route::get('/category/{slug}',[CategoryController::class, 'category'])->name('category');
Route::get('/tag/{slug}',[TagController::class, 'tag'])->name('tag');
Route::get('/search',[SearchController::class, 'search'])->name('search');
Route::get('contact-us',[ContactController::class, 'contact_us'])->name('contact_us');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
