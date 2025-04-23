<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\JawabanController;
use App\Http\Controllers\KuisController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\MateriSiswa;
use App\Http\Controllers\ProfileAdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SoalController;
<<<<<<< HEAD
use App\Http\Controllers\RangkingController;
=======
>>>>>>> e05cf1fbb2566edc3675e854fd7db4ceacf91132
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

//Hak akses admin
Route::middleware('auth','role:1')->group(function(){
    Route::resource('/admin/profile', ProfileAdminController::class);

    Route::get('/admin/index',[HomeController::class,'index'])->name('admin.index');
    Route::get('/admin/rangking',[RangkingController::class, 'index'])->name('admin.rangking');

    //Export jawaban
    Route::get('/admin/export',[JawabanController::class, 'export'])->name('admin.export');

    //Sidebar
    Route::resource('/admin/kuis',KuisController::class);
    Route::resource('/admin/soal',SoalController::class);
    Route::resource('/admin/nilai',JawabanController::class);
    Route::resource('/admin/siswa',SiswaController::class);
    Route::resource('/admin/materi',MateriController::class);
});

//Hak Akses siswa
Route::middleware('auth','role:2')->group(function(){
    Route::resource('/user/profil',ProfileController::class);
    Route::get('/user/soal/index',[SoalController::class, 'index'])->name('user.soal');
    Route::get('/user/index',[HomeController::class,'index'])->name('user.index');
    Route::get('/user/kuis/index',[UjianController::class,'index'])->name('ujian');
    Route::post('/user/soal/index',[JawabanController::class,'store'])->name('jawaban.store');
<<<<<<< HEAD
    Route::get('/user/materi/index/',[MateriSiswa::class, 'index'])->name('materi.siswa');
=======
>>>>>>> e05cf1fbb2566edc3675e854fd7db4ceacf91132
});


