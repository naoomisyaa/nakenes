<?php

use App\Http\Controllers\Api\BarangController;
use App\Http\Controllers\Api\JenisController;
use App\Http\Controllers\Api\MerkController;
use App\Http\Controllers\Api\NakeneController;
use App\Http\Controllers\Api\PenjualanController;
use App\Http\Controllers\Api\PenjualanDetailController;
use App\Http\Controllers\ApiCombineController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/combined-data', [ApiCombineController::class, 'getCombinedData']);

Route::Resource('/apibarang', BarangController::class);
Route::Resource('/apijenis', JenisController::class);
Route::Resource('/apimerk', MerkController::class);
Route::Resource('/apipenjualan', PenjualanController::class);
Route::Resource('/apipenjualandetail', PenjualanDetailController::class);
Route::Resource('/apinakene', NakeneController::class);





