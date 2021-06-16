<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\UserManagerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DraftChartsController;
use App\Http\Controllers\MailController;

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
Route::get('/',[AuthController::class,'login'])->name('login');

Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard')->middleware('auth');

Route::get('/visitors', [VisitorController::class, 'index'])->name('visitor')->middleware('auth');

Route::prefix('usermanager')->group(function () {
    Route::get('/', [UserManagerController::class,'index']);
    Route::get('/create', [UserManagerController::class,'create'])->name('user-create');
    Route::post('/submit',[UserManagerController::class,'store'])->name('user-submit');
    Route::get('/edit/{id}',[UserManagerController::class,'edit'])->name('user-edit');
    Route::post('/update/{id}',[UserManagerController::class,'update'])->name('user-update');
    Route::get('/delete/{id}',[UserManagerController::class,'destroy'])->name('user-delete');
});

Route::get('/login',[AuthController::class,'login'])->name('login');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');
Route::post('/login/submit',[AuthController::class,'submit'])->name('login-submit');
Route::get('/resetPassword',[AuthController::class,'resetPassword'])->name('reset-password')->middleware('auth');
Route::post('/resetPassword/submit',[AuthController::class,'resetPasswordSubmit'])->name('reset-password-submit')->middleware('auth');

Route::get('/draftCharts',[DraftChartsController::class, 'index']);

Route::get('/mailSent',[MailController::class, 'basic_email']);
