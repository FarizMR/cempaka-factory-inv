<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\api\FigurController;
use App\Http\Controllers\api\JenisBarangController;
use App\Http\Controllers\api\SatuanController;
use App\Http\Controllers\ViewController\ViewBarangMasukController;
use App\Http\Controllers\ViewController\ViewBarangKeluarController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('figur')->group(function () {
    Route::get('/', [FigurController::class, 'index']);
    Route::post('/', [FigurController::class, 'store']);
    Route::get('/{id}', [FigurController::class, 'show']);
    Route::put('/{id}', [FigurController::class, 'update']);
    Route::delete('/{id}', [FigurController::class, 'destroy']);
    Route::get('/pemasok', [FigurController::class, 'getPemasok']);
    Route::get('/konsumen', [FigurController::class, 'getKonsumen']);
});

Route::prefix('jenis-barang')->group(function () {
    Route::get('/', [JenisBarangController::class, 'index']);
    Route::post('/', [JenisBarangController::class, 'store']);
    Route::put('/{id}', [JenisBarangController::class, 'update']);
    Route::get('/{id}', [JenisBarangController::class, 'show']);
    Route::delete('/{id}', [JenisBarangController::class, 'destroy']);
});

Route::prefix('satuan')->group(function () {
    Route::get('/', [SatuanController::class, 'index']);
    Route::post('/', [SatuanController::class, 'store']);
    Route::get('/{id}', [SatuanController::class, 'show']);
    Route::put('/{id}', [SatuanController::class, 'update']);
    Route::delete('/{id}', [SatuanController::class, 'destroy']);
});

Route::prefix('barang-masuk')->group(function () {
    Route::get('/', [ViewBarangMasukController::class, 'index']);
});

Route::prefix('barang-keluar')->group(function () {
    Route::get('/', [ViewBarangKeluarController::class, 'index']);
});
