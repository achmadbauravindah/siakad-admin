<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
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


// Auth Route (Login and Register)
Auth::routes();
Route::get('/', [LoginController::class, 'viewRolesLogin']);
Route::get('/login', [LoginController::class, 'viewRolesLogin'])->name('viewRolesLogin');
Route::post('/login', [LoginController::class, 'rolesLogin'])->name('rolesLogin');
Route::get('/admin/login', [LoginController::class, 'viewAdminLogin'])->name('viewAdminLogin');
Route::post('/admin/login', [LoginController::class, 'adminLogin'])->name('adminLogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
// Disable Default Auth from Laravel UI Auth
Route::get('/register', [LoginController::class, 'disableDefaultAuth']);

// HALAMAN SIAKAD ADMIN
Route::group(
    ['middleware' => 'auth:admin', 'prefix' => 'admin', 'as' => 'admin.'],
    function () {
        // Dashboard
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        // Admin - Mahasiswa
        Route::group(
            ['prefix' => 'mahasiswas', 'as' => 'mahasiswas.'],
            function () {
                Route::get('/', [MahasiswaController::class, 'indexAdmin'])->name('indexAdmin');
                Route::get('/create', [MahasiswaController::class, 'create'])->name('create');
            }
        );
        // Admin - Dosen
        Route::group(
            ['prefix' => 'dosens', 'as' => 'dosens.'],
            function () {
                Route::get('/', [DosenController::class, 'indexAdmin'])->name('index');
                Route::get('/create', [DosenController::class, 'create'])->name('create');
            }
        );
    }
);

// HALAMAN MAHASISWA
Route::group(
    ['middleware' => 'auth:mahasiswa', 'prefix' => 'mahasiswa', 'as' => 'mahasiswa.'],
    function () {
        Route::get('/', [MahasiswaController::class, 'index'])->name('index');
    }
);

// HALAMAN DOSEN
Route::group(
    ['middleware' => 'auth:dosen', 'prefix' => 'dosen', 'as' => 'dosen.'],
    function () {
        Route::get('/', [DosenController::class, 'index'])->name('index');
    }
);
