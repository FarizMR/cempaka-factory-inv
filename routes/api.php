<?php

use App\Http\Controllers\api\BarangKeluarController;
use App\Http\Controllers\api\BarangMasukController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\api\LoginController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('user')->group(function () {
    Route::post('/login', [LoginController::class, 'login'])->name('api.login');
    Route::post('/logout', [LoginController::class, 'logout'])->name('api.logout');
});

Route::prefix('figur')->group(function () {
    Route::get('/', [FigurController::class, 'index']);
    Route::post('/', [FigurController::class, 'store']);

    Route::get('/pemasok', [FigurController::class, 'getPemasok']);
    Route::get('/konsumen', [FigurController::class, 'getKonsumen']);

    Route::get('/{id}', [FigurController::class, 'show']);
    Route::put('/{id}', [FigurController::class, 'update']);
    Route::delete('/{id}', [FigurController::class, 'destroy']);
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
    Route::get('/', [BarangMasukController::class, 'index']);
    Route::post('/', [BarangMasukController::class, 'store']);
    Route::delete('/{id}', [BarangMasukController::class, 'destroy']);
    Route::get('/{id}', [BarangMasukController::class, 'show']);
    Route::put('/{id}', [BarangMasukController::class, 'update']);
});

Route::prefix('barang-keluar')->group(function () {
    Route::get('/', [BarangKeluarController::class, 'index']);
    Route::post('/', [BarangKeluarController::class, 'store']);
    Route::delete('/{id}', [BarangKeluarController::class, 'destroy']);
    Route::get('/{id}', [BarangKeluarController::class, 'show']);
    Route::put('/{id}', [BarangKeluarController::class, 'update']);
});

Route::prefix('view-table')->group(function () {
    Route::get('/barang-masuk', [ViewBarangMasukController::class, 'index']);
    Route::get('/barang-keluar', [ViewBarangKeluarController::class, 'index']);
});
