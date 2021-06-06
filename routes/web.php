<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\UserManagerController;

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

Route::get('/', [HomeController::class, 'dashboard']);

Route::get('/visitors', [VisitorController::class, 'index']);

Route::prefix('usermanager')->group(function () {
    Route::get('/', [UserManagerController::class,'index']);
    Route::get('/create', [UserManagerController::class,'create']);
    Route::post('/submit',[UserManagerController::class,'store']);
    Route::get('/edit/{id}',[UserManagerController::class,'edit']);
    Route::post('/update/{id}',[UserManagerController::class,'update']);
    Route::get('/delete/{id}',[UserManagerController::class,'destroy']);
});
