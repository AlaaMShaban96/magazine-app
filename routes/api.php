<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\FolderController;
use App\Http\Controllers\API\MagazineController;
use App\Http\Controllers\API\CorporationController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('/login',[AuthController::class,'login']);

Route::middleware('auth:api')->group(function () {
    
    Route::get('/index',[AuthController::class,'index']);
    Route::get('/corporation',[CorporationController::class,'index']);

    Route::get('/magazine',[MagazineController::class,'index']);
    Route::get('/magazine/{magazine}',[MagazineController::class,'show']);
    Route::get('/magazine/{magazine}/folder',[FolderController::class,'index']);

});

// Route::resource('/corporation', CorporationController::class);
// Route::resource('/magazine', MagazineController::class);
