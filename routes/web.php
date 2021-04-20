<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\MagazineController;
use App\Http\Controllers\CorporationController;

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

Route::get('/', [AdminController::class,'index'])->name('login');
Route::post('/login', [AdminController::class,'login']);

Route::middleware(['adminauth'])->group(function () {
    
    Route::get('/logout', [AdminController::class,'logout'])->name('logout');

    Route::get('/dashboard', [AdminController::class,'show'])->name('dashboard');
    // Route::get('/magazines', [MagazineController::class,'index']);
    Route::get('/rating', [RatingController::class,'index']);

    Route::get('/countries', [CountryController::class,'index'])->name('countries');
    Route::post('/countries', [CountryController::class,'store']);
    Route::delete('/countries/{country}',[CountryController::class,'destroy']);

    Route::get('/corporations', [CorporationController::class,'index'])->name('corporations');
    Route::post('/corporations', [CorporationController::class,'store']);
    Route::delete('/corporations/{corporation}',[CorporationController::class,'destroy']);

    Route::get('/ratings', [RatingController::class,'index'])->name('ratings');
    Route::post('/ratings', [RatingController::class,'store']);
    Route::delete('/ratings/{rating}',[RatingController::class,'destroy']);

    Route::get('/magazines', [MagazineController::class,'index'])->name('magazines');
    Route::get('/magazines/{magazine}', [MagazineController::class,'edit'])->name('magazines');
    Route::put('/magazines/{magazine}', [MagazineController::class,'update']);
    Route::post('/magazines', [MagazineController::class,'store']);
    Route::delete('/magazines/{magazine}',[MagazineController::class,'destroy']);

});
