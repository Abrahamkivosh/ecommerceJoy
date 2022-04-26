<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
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

Route::get('/cart',[PageController::class, 'cart' ])->name('client.cart') ;
Route::post('/cart',[PageController::class, 'addToCart' ])->name('client.cart.add') ;
Route::get('/',[PageController::class, 'index' ])->name('client.index') ;
Route::get('/client/categories',[PageController::class, 'categories' ])->name('client.categories');
Route::get('/client/categories/{category}',[PageController::class, 'showCategory' ])->name('client.categories.show');
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('adminPage',[AdminController::class,'admin'])->name('admin.index');
Route::resource('categories', CategoryController::class);
Route::resource('subCategories', SubCategoryController::class);
Route::resource('products',ProductController::class);
Route::resource('orders',OrderController::class);

// users
// edit user profile
Route::get('/userEdit/{id}',[HomeController::class,'edit'])->name('user.edit');
Route::put('/userUpdate/{id}',[HomeController::class,'update'])->name('user.update');
Route::get('/users',[HomeController::class, 'users'])->name('user.index');
Route::delete('user/{id}',[HomeController::class, 'destroy'])->name('user.delete');
