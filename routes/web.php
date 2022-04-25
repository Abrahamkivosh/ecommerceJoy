<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;

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



Route::get('/',[PageController::class, 'index' ])->name('client.index') ;
Route::get('/categories',[PageController::class, 'categories' ])->name('client.categories') ;
Route::get('/cart',[PageController::class, 'cart' ])->name('client.cart') ;
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('adminPage',[AdminController::class,'admin'])->name('admin.index');
Route::resource('categories', CategoryController::class);
Route::resource('subCategories', SubCategoryController::class);
Route::resource('products',ProductController::class);
