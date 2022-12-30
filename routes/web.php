<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WargaController;
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

Route::get('/', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/home', [HomeController::class, "index"])->name('home')->middleware('auth');
Route::prefix('akun')->group(function () {
    Route::controller(AkunController::class)->group(function () {
        Route::middleware(['auth', 'admin'])->group(function () {
            Route::get('index', 'index')->name('akun');
            Route::post('store', 'store')->name('akun.store');
            Route::post('update', 'update')->name('akun.update');
            Route::post('destroy', 'destroy')->name('akun.destroy');
            Route::post('delete', 'delete')->name('akun.delete');
            Route::get('restore/{id}', 'restore')->name('akun.restore');
            Route::get('trash', 'trash')->name('akun.trash');
        });
    });
});

Route::prefix('dokumen')->group(function () {
    Route::controller(DokumenController::class)->group(function () {
        Route::get('pending', 'pending')->name('dokumen.pending')->middleware(['auth', 'adminorpetugas']);
        Route::get('download/{id}', 'download')->name('dokumen.download')->middleware(['auth', 'adminorpetugas']);
        Route::post('status', 'status')->name('dokumen.status')->middleware(['auth', 'admin']);
        Route::get('approve', 'approve')->name('dokumen.approve')->middleware(['auth', 'adminorpetugas']);
        Route::get('reject', 'reject')->name('dokumen.reject')->middleware(['auth', 'adminorpetugas']);
        Route::get('create', 'create')->name('dokumen.create')->middleware(['auth', 'petugas']);
        Route::post('store', 'store')->name('dokumen.store')->middleware(['auth', 'petugas']);
        Route::post('delete', 'delete')->name('dokumen.delete')->middleware(['auth', 'petugas']);
        Route::post('destroy', 'destroy')->name('dokumen.destroy')->middleware(['auth', 'petugas']);
        Route::get('trash', 'trash')->name('dokumen.trash')->middleware(['auth', 'petugas']);
        Route::get('restore/{id}', 'restore')->name('dokumen.restore')->middleware(['auth', 'petugas']);
    });
});

Route::prefix('warga')->group(function () {
    Route::controller(WargaController::class)->group(function () {
        Route::get('create', 'create')->name('warga.create')->middleware(['auth', 'petugas']);
        Route::post('ktp/store', 'storeKtp')->name('warga.ktp.store')->middleware(['auth', 'petugas']);
        Route::post('kk/store', 'storeKk')->name('warga.kk.store')->middleware(['auth', 'petugas']);
        Route::get('index', 'index')->name('warga.index')->middleware(['auth', 'adminorpetugas']);
        Route::post('export', 'export')->name('warga.export')->middleware(['auth', 'adminorpetugas']);
    });
});
