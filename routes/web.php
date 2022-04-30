<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\FoodController;
use App\Http\Controllers\Dashboard\CategoryController;

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
    return view('welcome');
});

Route::get('manager', fn() => view('template.dashboard'))->name('manager');
//CRUD food
Route::group(['prefix'=>'foods'],function(){
    Route::get('/manager', [FoodController::class, 'index'])->name('foods');
    Route::get('/search',[FoodController::class,'search'])->name('search');
    Route::get('create', [FoodController::class, 'create'])->name('foods.create');
    Route::post('store',[FoodController::class, 'store'])->name('foods.store');
    Route::get('/{food}/edit',[FoodController::class, 'edit'])->name('foods.edit');
    Route::post('/{food}/update',[FoodController::class, 'update'])->name('foods.update');
    Route::get('/{food}/confirm',[FoodController::class, 'confirm'])->name('foods.confirm');
    Route::post('/{food}/delete',[FoodController::class, 'delete'])->name('foods.delete');
});

//CRUD Category
Route::group(['prefix' => 'category'], function () {
    Route::get('', [CategoryController::class, 'index'])->name('category');
    Route::get('create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/{id}/update', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/{id}/destroy', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::post('/{id}/destroy', [CategoryController::class, 'delete'])->name('category.delete');

});


