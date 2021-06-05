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

Route::get('/usermanager', [UserManagerController::class,'index']);
Route::get('/usermanager/create', [UserManagerController::class,'create']);
Route::post('/usermanager_submit',[UserManagerController::class,'store']);

