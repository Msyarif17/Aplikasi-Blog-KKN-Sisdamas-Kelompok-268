<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\DetailBlogController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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



Route::get('/',[HomeController::class, 'base'])->name('home');
Route::get('/detail-blog/{id}',[DetailBlogController::class, 'index'])->name('detail');
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
Route::get('/logbook/{slug}/{post_id}',[LogbookController::class, 'logbook'])->name('logbook');

Auth::routes();

Route::middleware('auth')->prefix('dashboard')->name('dashboard.')->group(function(){
    Route::get('/',[DashboardController::class, 'index'])->name('index');
    Route::resource('/category',App\Http\Controllers\Backend\CategoryController::class);
    Route::resource('/tag',App\Http\Controllers\Backend\TagController::class);
    Route::resource('/blog',App\Http\Controllers\Backend\BlogController::class);
    Route::resource('/user',App\Http\Controllers\Backend\UserController::class);
    Route::post('/ckeditor/upload',);

});
