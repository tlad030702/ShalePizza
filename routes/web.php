<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Dashboard\FoodController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\CustomerController;
use App\Http\Controllers\Dashboard\AdminController;
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
    Route::post('/signin',[ManualAuthController::class,'signin'])->name('auth.signin');
    Route::get('/logout',[ManualAuthController::class, 'logout'])->name('auth.logout');
});

//manage
Route::prefix('manager')->
// middleware('manual.auth')->
group(function () {
    Route::get('', fn() => view('template.dashboard'))->name('manager');
    //CRUD food
    Route::group(['prefix'=>'foods'],function(){
        Route::get('/manager', [FoodController::class, 'index'])->name('manager.foods');
        Route::get('/search',[FoodController::class,'search'])->name('manager.foods.search');
        Route::get('create', [FoodController::class, 'create'])->name('manager.foods.create');
        Route::post('store',[FoodController::class, 'store'])->name('manager.foods.store');
        Route::get('/{food}/edit',[FoodController::class, 'edit'])->name('manager.foods.edit');
        Route::post('/{food}/update',[FoodController::class, 'update'])->name('manager.foods.update');
        Route::get('/{food}/confirm',[FoodController::class, 'confirm'])->name('manager.foods.confirm');
        Route::post('/{food}/delete',[FoodController::class, 'delete'])->name('manager.foods.delete');
    });

    //CRUD Category
    Route::group(['prefix' => 'category'], function () {
        Route::get('', [CategoryController::class, 'index'])->name('manager.category');
        Route::get('create', [CategoryController::class, 'create'])->name('manager.category.create');
        Route::post('store', [CategoryController::class, 'store'])->name('manager.category.store');
        Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('manager.category.edit');
        Route::post('/{id}/update', [CategoryController::class, 'update'])->name('manager.category.update');
        Route::get('/{id}/destroy', [CategoryController::class, 'destroy'])->name('manager.category.destroy');
        Route::post('/{id}/destroy', [CategoryController::class, 'delete'])->name('manager.category.delete');
    });

    //RUD for customer
    Route::group(['prefix' => 'customer'], function() {
        Route::get('/', [CustomerController::class, 'index'])->name('manager.customer');
        Route::get('/{customer}/edit', [CustomerController::class, 'edit'])->name('manager.customer.edit');
        Route::post('/{customer}/update', [CustomerController::class, 'update'])->name('manager.customer.update');
        Route::get('/{customer}/confirm', [CustomerController::class, 'confirm'])->name('manager.customer.confirm');
        Route::post('/{customer}/delete', [CustomerController::class, 'delete'])->name('manager.customer.delete');
    });

    //RU Admin 
    Route::group(['prefix'=>'admins'], function(){
        Route::get('/manager', [AdminController::class, 'index'])->name('manager.admins');
        Route::get('/{id}/edit',[AdminController::class, 'edit'])->name('manager.admin.edit');
    });
});
  
    