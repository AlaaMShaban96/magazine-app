<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\NoteController;
use App\Http\Controllers\API\FolderController;
use App\Http\Controllers\API\CountryController;
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
Route::post('/register',[AuthController::class,'register']);
Route::post('/reSendCode',[AuthController::class,'reSendCode']);
Route::post('/verified',[AuthController::class,'verified']);

Route::middleware('auth:sanctum')->group(function () {
    
    Route::get('/index',[AuthController::class,'index']);
    Route::get('/corporation',[CorporationController::class,'index']);

    Route::get('/country',[CountryController::class,'index']);
    Route::get('/country/{country}/magazine',[CountryController::class,'show']);



    Route::get('/magazine',[MagazineController::class,'index']);
    Route::get('/magazine/{magazine}',[MagazineController::class,'show']);
    Route::get('/magazine/{magazine}/save',[MagazineController::class,'save']);

    Route::get('/magazine/{magazine}/folder',[FolderController::class,'index']);

    Route::post('/note',[NoteController::class,'store']);

});

// Route::resource('/corporation', CorporationController::class);
// Route::resource('/magazine', MagazineController::class);
