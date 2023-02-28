<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController, ProductController, CategoryController, DashboardController};

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
Route::view('/swagger','swagger');
Route::get('/',[DashboardController::class,'index']);
Route::get('/dashboard',[DashboardController::class,'index']);
Route::get('home',[HomeController::class,'home']);

Route::group([
    'prefix'=> '/product',
    'as' => 'product.',
], function(){
    Route::get('add',[ProductController::class,'index'])->name('add');
    Route::post('store',[ProductController::class,'store'])->name('store');
    Route::get('list',[ProductController::class,'list'])->name('list');
});

Route::group([
    'prefix'=>'/category',
    'as'=>'category.',
], function(){
    Route::get('add',[CategoryController::class,'create'])->name('add');
    Route::post('store',[CategoryController::class,'store'])->name('store');
    Route::get('list',[CategoryController::class,'list'])->name('list');
});