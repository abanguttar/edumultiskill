<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KelasKategoriController;
use App\Http\Controllers\TutorController;
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
        Route::get('/{id}/permissions',  'permissionView')->name('view-permission');
        Route::put('/{id}/permissions',  'permissionUpdate');
    });


    Route::controller(TutorController::class)->prefix('tutor')->group(function () {
        Route::get('', 'index')->name('list-tutor');
        Route::get('/create', 'create');
        Route::post('/create', 'store');
        Route::get('/{id}/edit', 'edit')->name('tutor-edit');
        Route::put('/{id}/edit', 'update');
        // Route::get('/{id}/permissions',  'permissionView')->name('view-permission');
        // Route::put('/{id}/permissions',  'permissionUpdate');
    });


    /**
     * Route untuk kelas dan kelas kategori
     */
    Route::prefix('kelas')->group(function () {


        Route::controller(KelasController::class)->group(function () {
            Route::get('', 'index')->name('list-kelas')->middleware('permission:10');
            Route::get('/create', 'create')->name('create-kelas')->middleware('permission:11');
            Route::post('/create', 'store')->name('store-kelas')->middleware('permission:11');
            Route::get('/{id}/informasi', 'informasiView')->name('view-informasi')->middleware('permission:15');
            Route::put('/{id}/informasi', 'informasiUpdate')->middleware('permission:15');
            Route::get('/{id}/deskripsi', 'deskripsiView')->name('view-deskripsi')->middleware('permission:16');
            Route::put('/{id}/deskripsi', 'deskripsiUpdate')->middleware('permission:16');
            Route::get('/{id}/skkni', 'skkniView')->name('view-skkni')->middleware('permission:16');
            Route::put('/{id}/skkni', 'skkniUpdate')->middleware('permission:16');
            Route::get('/{id}/jadwal', 'jadwalView')->name('view-jadwal')->middleware('permission:16');
            Route::get('/{id}/jadwal/create', 'jadwalCreate')->name('create-jadwal')->middleware('permission:16');
            Route::post('/{id}/jadwal/create', 'jadwalStore')->middleware('permission:16');
            Route::get('/{id}/jadwal/{jadwal_id}/edit', 'jadwalEdit')->name('edit-jadwal')->middleware('permission:16');
            Route::put('/{id}/jadwal/{jadwal_id}/edit', 'jadwalUpdate')->middleware('permission:16');
            Route::get('/{id}/jadwal/arsip', 'jadwalViewArsip')->name('view-arsip-jadwal')->middleware('permission:16');
            Route::put('/{id}/jadwal/{jadwal_id}/arsip', 'jadwalArsip')->name('arsip-jadwal')->middleware('permission:16');
            Route::delete('/{id}/jadwal/{jadwal_id}/destroy', 'jadwalDelete')->name('destroy-jadwal')->middleware('permission:16');
        });

        Route::controller(KelasKategoriController::class)->group(function () {
            Route::prefix('kategori')->group(function () {
                Route::get('', 'index')->name('list-kategori')->middleware('permission:6');
                Route::get('/create', 'create')->middleware('permission:7');
                Route::post('/create', 'store')->middleware('permission:7');
                Route::get('/{id}/edit', 'edit')->middleware('permission:8');
                Route::put('/{id}/edit', 'update')->middleware('permission:8');
                Route::delete('/{id}', 'destroy')->middleware('permission:9');
            });
        });
    });


    Route::prefix('certificate')->controller(CertificateController::class)->group(function () {
        Route::get('/preview/{id}/header/{nilai}', 'previewHeader');
    });



    Route::prefix('beranda')->controller(BerandaController::class)->group(function () {
        Route::get('', 'index')->name('list-beranda');
        Route::get('/banner/create', 'createBanner');
        Route::post('/banner/create', 'storeBanner');
        Route::get('/banner/{id}/edit', 'editBanner')->name('edit-banner');
        Route::put('/banner/{id}/edit', 'updateBanner');

        Route::get('/logo/create', 'createLogo');
        Route::post('/logo/create', 'storeLogo');
        Route::get('/logo/{id}/edit', 'editLogo')->name('edit-logo');
        Route::put('/logo/{id}/edit', 'updateLogo');

        Route::get('/testimoni/create', 'createTestimoni');
        Route::post('/testimoni/create', 'storeTestimoni');
        Route::get('/testimoni/{id}/edit', 'editTestimoni')->name('edit-testimoni');
        Route::put('/testimoni/{id}/edit', 'updateTestimoni');

        Route::put('/link/edit', 'updateLink');
    });
});




Route::prefix('ajax')->controller(AjaxController::class)->group(function () {
    Route::get('tutor', 'fetchTutor');
});
