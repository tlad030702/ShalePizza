<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Dashboard\FoodController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\CustomerController;
use App\Http\Controllers\Dashboard\ManualAuthController;

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

//home
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contact', fn() => view('contact'))->name('contact');
Route::get('/search',[HomeController::class,'contact'])->name('search.home');
Route::group(['prefix'=>'home'],function(){
    Route::get('detail/{id}', [HomeController::class,'show'])->name('detail.home');
    Route::get('/{id}',[HomeController::class,'filter'])->name('filter.home');
});

//Register
Route::get('/register', fn() => view('register'))->name('register');
Route::post('/store',[CustomerController::class, 'store'])->name('register.store');

//login
Route::group(['prefix' => 'auth'], function (){
    Route::get('/login',[ManualAuthController::class, 'ask'])->name('auth.ask');
    Route::post('/login',[ManualAuthController::class,'signin'])->name('auth.signin');
    Route::get('/logout',[ManualAuthController::class, 'logout'])->name('auth.logout');
});


Route::get('manager', fn() => view('template.dashboard'))->name('manager');

//RU Admin 
Route::group(['prefix'=>'admins'], function(){
    Route::get('/manager', [AdminController::class, 'index'])->name('admins');
    Route::get('/{id}/edit',[AdminController::class, 'edit'])->name('admin.edit');
});

Route::get('manager', fn() => view('template.dashboard'))->name('manager')->middleware('manual.auth');
//CRUD food
Route::group(['prefix'=>'foods', 'middleware' => ['manual.auth']],function(){
    Route::get('/manager', [FoodController::class, 'index'])->name('foods');
    Route::get('/search',[FoodController::class,'search'])->name('foods.search');
    Route::get('create', [FoodController::class, 'create'])->name('foods.create');
    Route::post('store',[FoodController::class, 'store'])->name('foods.store');
    Route::get('/{food}/edit',[FoodController::class, 'edit'])->name('foods.edit');
    Route::post('/{food}/update',[FoodController::class, 'update'])->name('foods.update');
    Route::get('/{food}/confirm',[FoodController::class, 'confirm'])->name('foods.confirm');
    Route::post('/{food}/delete',[FoodController::class, 'delete'])->name('foods.delete');
});

//CRUD Category
Route::group(['prefix' => 'category', 'middleware' => ['manual.auth']], function () {
    Route::get('', [CategoryController::class, 'index'])->name('category');
    Route::get('create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/{id}/update', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/{id}/destroy', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::post('/{id}/destroy', [CategoryController::class, 'delete'])->name('category.delete');
});

//RUD for customer
Route::group(['prefix' => 'customer', 'middleware' => ['manual.auth']], function() {
    Route::get('/', [CustomerController::class, 'index'])->name('customer');
    Route::get('/{customer}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::post('/{customer}/update', [CustomerController::class, 'update'])->name('customer.update');
    Route::get('/{customer}/confirm', [CustomerController::class, 'confirm'])->name('customer.confirm');
    Route::post('/{customer}/delete', [CustomerController::class, 'delete'])->name('customer.delete');
});
