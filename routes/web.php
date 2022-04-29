<?php

use App\Http\Controllers\Dashboard\FoodController;
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
    return view('welcome');
});


//CRUD Category
Route::group(['prefix' => 'category'], function () {
    Route::get('', [
        'uses' => 'CategoryController@index',
        'as' => 'category.index'
    ]);
});


Route::get('manager', fn() => view('template.dashboard'))->name('manager');
//CRUD food
Route::group(['prefix'=>'foods'],function(){
    Route::get('', [FoodController::class, 'index'])->name('foods');
    Route::get('create', [FoodController::class, 'create'])->name('foods.create');
    Route::post('store',[FoodController::class, 'store'])->name('foods.store');
    Route::get('{food}/edit',[FoodController::class, 'edit'])->name('foods.edit');
    Route::post('{food}/update',[FoodController::class, 'update'])->name('foods.update');
    Route::get('{food}/confirm',[FoodController::class, 'confirm'])->name('foods.confirm');
    Route::post('{food}/delete',[FoodController::class, 'delete'])->name('foods.delete');
});

