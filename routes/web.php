<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\NumberController;
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

    Route::get('/admins', [AdminController::class,'indexView'])->name('admin');
    Route::post('/admins', [AdminController::class,'store'])->name('admin');
    Route::get('/admins/{admin}', [AdminController::class,'showView'])->name('admin');
    Route::put('/admins/{admin}', [AdminController::class,'update'])->name('admin');
    Route::delete('/admins/{admin}', [AdminController::class,'destroy'])->name('admin');

    Route::get('/dashboard', [AdminController::class,'show'])->name('dashboard');
    Route::get('/notes', [NoteController::class,'index'])->name('notes');
    // Route::get('/magazines', [MagazineController::class,'index']);
    Route::get('/rating', [RatingController::class,'index']);

    Route::get('/countries', [CountryController::class,'index'])->name('countries');
    Route::get('/countries/{country}', [CountryController::class,'edit'])->name('countries');
    Route::put('/countries/{country}', [CountryController::class,'update']);
    Route::post('/countries', [CountryController::class,'store']);
    Route::delete('/countries/{country}',[CountryController::class,'destroy']);

    Route::get('/corporations', [CorporationController::class,'index'])->name('corporations');
    Route::get('/corporations/{corporation}', [CorporationController::class,'edit'])->name('corporations');
    Route::post('/corporations', [CorporationController::class,'store']);
    Route::put('/corporations/{corporation}', [CorporationController::class,'update']);
    Route::delete('/corporations/{corporation}',[CorporationController::class,'destroy']);

    Route::get('/ratings', [RatingController::class,'index'])->name('ratings');
    Route::get('/ratings/{rating}', [RatingController::class,'edit'])->name('ratings');
    Route::put('/ratings/{rating}', [RatingController::class,'update']);
    Route::post('/ratings', [RatingController::class,'store']);
    Route::delete('/ratings/{rating}',[RatingController::class,'destroy']);

    Route::get('/magazines', [MagazineController::class,'index'])->name('magazines');
    Route::get('/magazines/{magazine}', [MagazineController::class,'edit'])->name('magazines');
    Route::put('/magazines/{magazine}', [MagazineController::class,'update']);
    Route::post('/magazines', [MagazineController::class,'store']);
    Route::delete('/magazines/{magazine}',[MagazineController::class,'destroy']);

    Route::get('/magazines/{magazine}/folders',[MagazineController::class,'folders'])->name('folders');
    Route::post('/magazines/{magazine}/folders',[FolderController::class,'store'])->name('folders');
    Route::delete('/folders/{folder}',[FolderController::class,'destroy']);

    Route::get('/folders/{folder}/numbers',[FolderController::class,'numbers'])->name('numbers');
    Route::post('/folders/{folder}/numbers',[NumberController::class,'store'])->name('numbers');
    Route::delete('/numbers/{number}',[NumberController::class,'destroy']);
    Route::get('/numbers/{number}', [NumberController::class,'edit'])->name('numbers.update');
    Route::put('/numbers/{number}', [NumberController::class,'update']);


});
