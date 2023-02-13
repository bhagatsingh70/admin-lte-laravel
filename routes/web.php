<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController, ProductController};

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

Route::get('home',[HomeController::class,'home']);
Route::group([
    'prefix'=> '/product',
    'as' => 'product.',
], function(){
    Route::get('add',[ProductController::class,'index'])->name('add');
    Route::post('store',[ProductController::class,'store'])->name('store');
});
