<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\UserManagerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DraftChartsController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\MenuController;

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

Route::get('usermanager/create', [UserManagerController::class,'create'])->name('user.create');

Route::prefix('usermanager')->group(function () {
    Route::get('/',[UserManagerController::class,'index'])->name('usermanager');
    Route::post('/store',[UserManagerController::class,'store'])->name('user.store');
    Route::get('/edit/{id}',[UserManagerController::class,'edit'])->name('user.edit');
    Route::post('/update/{id}',[UserManagerController::class,'update'])->name('user.update');
    Route::post('/delete/{id}',[UserManagerController::class,'destroy'])->name('user.delete');
});

Route::prefix('menu')->middleware('auth')->group(function () {
    Route::get('/', [MenuController::class,'index'])->name('menu');
    Route::get('/create', [MenuController::class,'create'])->name('menu.create');
    Route::post('/store',[MenuController::class,'store'])->name('menu.store');
    Route::get('/edit/{id}',[MenuController::class,'edit'])->name('menu.edit');
    Route::post('/update/{id}',[MenuController::class,'update'])->name('menu.update');
    Route::post('/delete/{id}',[MenuController::class,'destroy'])->name('menu.delete');
});

Route::get('/login',[AuthController::class,'login'])->name('login');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');
Route::post('/login/submit',[AuthController::class,'submit'])->name('login.submit');
Route::get('/resetPassword',[AuthController::class,'resetPassword'])->name('reset-password')->middleware('auth');
Route::post('/resetPassword/submit',[AuthController::class,'resetPasswordSubmit'])->name('reset-password-submit')->middleware('auth');

Route::get('/draftCharts',[DraftChartsController::class, 'index']);

Route::prefix('mail')->middleware('auth')->group(function () {
    Route::get('/',[MailController::class, 'index'])->name('mail.page');
    Route::get('/mailSent',[MailController::class, 'basic_email'])->name('mail.sent');
});
