<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\{UserAuthController, CategoryController};
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

 
//Route::group(['middleware' => ['cors']], function () {
    Route::post('/login', [UserAuthController::class,'login']);
    Route::post('/register', [UserAuthController::class,'register']);

    Route::group(['prefix'=>'category'],function(){
        Route::get('list', [CategoryController::class,'list']);
    });
 

    //protectet routes
    Route::middleware('auth:api')->group( function () {
        Route::get('/users', [UserAuthController::class,'listUsers']);
    });


/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/


//});