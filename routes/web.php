<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KelasKategoriController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::prefix('admin')->middleware(['auth'])->group(function () {

    Route::controller(AuthController::class)->group(function () {
        Route::get('/login',  'adminLoginIndex')->withoutMiddleware(['auth'])->name('login');
        Route::post('/login',  'adminAttemptLogin')->withoutMiddleware(['auth']);
        Route::post('/logout',  'adminAttemptLogout');
        Route::get('/dashboard',  'dashboard');

        /**
         * Route untuk membuat akses dan admin
         */
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('/index', 'index')->name('list-admin');
        Route::get('/create', 'create');
        Route::post('/create', 'store');
        Route::get('/{id}/edit', 'edit');
        Route::put('/{id}/edit', 'update');
    });


    /**
     * Route untuk kelas dan kelas kategori
     */
    Route::prefix('kelas')->group(function () {


        Route::controller(KelasController::class)->group(function () {
            Route::get('', 'index')->name('list-kelas');
            Route::get('/create', 'create')->name('create-kelas');
            Route::post('/create', 'store')->name('store-kelas');
            Route::get('/{id}/informasi', 'informasiView')->name('view-informasi');
            Route::put('/{id}/informasi', 'informasiUpdate');
            Route::get('/{id}/deskripsi', 'deskripsiView')->name('view-deskripsi');
            Route::put('/{id}/deskripsi', 'deskripsiUpdate');
        });

        Route::controller(KelasKategoriController::class)->group(function () {
            Route::prefix('kategori')->group(function () {
                Route::get('', 'index')->name('list-kategori');
                Route::get('/create', 'create');
                Route::post('/create', 'store');
                Route::get('/{id}/edit', 'edit');
                Route::put('/{id}/edit', 'update');
                Route::delete('/{id}', 'destroy');
            });
        });
    });
});
