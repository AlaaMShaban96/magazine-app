<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\NoteController;
use App\Http\Controllers\API\FolderController;
use App\Http\Controllers\API\NumberController;
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

//                      login
Route::post('/login',[AuthController::class,'login']);
//                      register
Route::post('/register',[AuthController::class,'register']);
//                      resend code to email verified
Route::post('/reSendCode',[AuthController::class,'reSendCode']);
//                      verified email 
Route::post('/verified',[AuthController::class,'verified']);
Route::post('/resetPasswordSend',[AuthController::class,'sendCodeToResetPassword']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/resetPassword',[AuthController::class,'resetPassword']);

    Route::get('/index',[AuthController::class,'index']);
    Route::get('/corporation',[CorporationController::class,'index']);

    Route::get('/country',[CountryController::class,'index']);
    Route::get('/country/{country}/magazine',[CountryController::class,'show']);

    //                      save magazine
    Route::post('/magazine/{magazine}/save',[MagazineController::class,'save']);
    Route::get('/magazine/save/show',[MagazineController::class,'showSave']);
    //                      show magazine
    Route::get('/magazine',[MagazineController::class,'index']);
    Route::get('/magazine/{magazine}',[MagazineController::class,'show']);
    Route::get('/magazine/{magazine}/folder',[FolderController::class,'index']);
    //                      save note
    Route::post('/note',[NoteController::class,'store']);
    Route::get('/note',[NoteController::class,'index']);
    //                       reading
    Route::post('/number/{number}/reading',[NumberController::class,'reading']);
    Route::post('/number/{number}/reading/remove',[NumberController::class,'remove']);



});

// Route::resource('/corporation', CorporationController::class);
// Route::resource('/magazine', MagazineController::class);
