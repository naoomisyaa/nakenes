<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\MerkController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PenjualanDetailController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BarangApiController;
use App\Http\Controllers\BarangClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenisApiController;
use App\Http\Controllers\MerkApiController;
use App\Http\Controllers\NakeneApiController;
use App\Http\Controllers\NakeneController;
use App\Http\Controllers\PenjualanApiController;
use App\Http\Controllers\PenjualanDetailApiController;
use App\Models\Jenis;
use App\Models\Penjualan;
use App\Models\PenjualanDetail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/nakene', [NakeneController::class, 'index'])->name('nakene.index');

Route::resource('barang', BarangController::class)->middleware('auth');
Route::resource('penjualan', PenjualanController::class)->middleware('auth');
Route::resource('jenis', JenisController::class)->middleware('auth');
Route::resource('merk', MerkController::class)->middleware('auth');
Route::resource('penjualandetail', PenjualanDetailController::class)->middleware('auth');
Route::post('/penjualandetail/store/{id_jual}', [PenjualanDetailController::class, 'store'])->name('penjualandetail.store');




Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::post('/logout', [ProfileController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
