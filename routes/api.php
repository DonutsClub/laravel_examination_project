<?php

use App\Http\Controllers\CountryController;
use Illuminate\Http\Request;
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

Route::prefix('/country')->group(function(){
    Route::name('country')->group(function(){
        Route::get('/all', [CountryController::class, 'index'])->name('index');
        Route::get('/show', [CountryController::class, 'show'])->name('show');
        Route::post('/store', [CountryController::class, 'store'])->name('store');
        Route::put('/update', [CountryController::class, 'update'])->name('update');
        Route::delete('/delete', [CountryController::class, 'delete'])->name('delete');
    });
});
