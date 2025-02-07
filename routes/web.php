<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\JawabanController;
use App\Http\Controllers\KuisController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SoalController;
use App\Http\Controllers\UjianController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/',[LandingPageController::class,'index'])->name('landing.index');
Route::get('/landing/about',[LandingPageController::class,'about'])->name('landing.about');
Route::get('/landing/tips',[LandingPageController::class,'caraBermain'])->name('landing.tips');

Route::middleware('auth','role:1')->group(function(){
    Route::get('/admin/index',[HomeController::class,'index'])->name('admin.index');

    Route::resource('/admin/kuis',KuisController::class);
    Route::resource('/admin/soal',SoalController::class);
    Route::resource('/admin/nilai',JawabanController::class);
    Route::resource('/admin/siswa',SiswaController::class);
});

Route::middleware('auth','role:2')->group(function(){
    Route::resource('/user/profil',ProfileController::class);
    Route::get('/user/soal/index',[SoalController::class, 'index'])->name('user.soal');
    Route::get('/user/index',[HomeController::class,'index'])->name('user.index');
    Route::get('/user/kuis/index',[UjianController::class,'index'])->name('ujian');
    Route::post('/user/soal/index',[JawabanController::class,'store'])->name('jawaban.store');
});


