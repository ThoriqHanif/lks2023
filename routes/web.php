<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BeliController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\bukuUser;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
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

Route::get('welcome/admin', [DashboardController::class, 'admin'])->middleware('isLogin');
Route::get('welcome', [DashboardController::class, 'index'])->middleware('isLogin');
Route::get('/', [SessionController::class, 'index']);

// ADMIN = SISWA
Route::middleware(['auth','checklevel:admin'])->group(function(){
    Route::resource('admin', AdminController::class)->middleware('isLogin');
    Route::resource('user', UserController::class)->middleware('isLogin');
});

// USER

// SISWA
Route::middleware(['auth','checklevel:user'])->group(function(){
Route::resource('siswa', SiswaController::class)->middleware('isLogin');
});

Route::middleware(['auth','checklevel:admin'])->group(function(){
});

Route::resource('barang', BarangController::class);
Route::resource('beli', BeliController::class);
Route::resource('kategori', KategoriController::class);
Route::get('transaksi', [TransaksiController::class, 'index']);




// PERLOGINAN
Route::get('login', [SessionController::class, 'index']);
Route::get('register', [SessionController::class, 'register']);
Route::post('sesi/login', [SessionController::class, 'login']);
Route::get('sesi/logout', [SessionController::class, 'logout']);

