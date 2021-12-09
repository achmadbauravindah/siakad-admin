<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KhsController;
use App\Http\Controllers\KrsController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\ProgramStudiController;
use App\Http\Controllers\StatusMatkulController;
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
                Route::get('/', [MahasiswaController::class, 'indexAdmin'])->name('index');
                Route::get('/create', [MahasiswaController::class, 'create'])->name('create');
                Route::post('/store', [MahasiswaController::class, 'store'])->name('store');
                Route::get('/edit/{mahasiswa:nim}', [MahasiswaController::class, 'edit'])->name('edit');
                Route::patch('/update/{mahasiswa:nim}', [MahasiswaController::class, 'update'])->name('update');
                // Destroy ubah ke delete di formnya juga
                Route::get('/destroy/{mahasiswa:nim}', [MahasiswaController::class, 'destroy'])->name('destroy');
                Route::get('/{mahasiswa:nim}', [MahasiswaController::class, 'show'])->name('show');
            }
        );
        // Admin - Dosen
        Route::group(
            ['prefix' => 'dosens', 'as' => 'dosens.'],
            function () {
                Route::get('/', [DosenController::class, 'indexAdmin'])->name('index');
                Route::get('/create', [DosenController::class, 'create'])->name('create');
                Route::post('/store', [DosenController::class, 'store'])->name('store');
                Route::get('/edit/{dosen:nip}', [DosenController::class, 'edit'])->name('edit');
                Route::patch('/update/{dosen:nip}', [DosenController::class, 'update'])->name('update');
                Route::get('/destroy/{dosen:nip}', [DosenController::class, 'destroy'])->name('destroy');
                Route::get('/{dosen:nip}', [DosenController::class, 'show'])->name('show');
            }
        );
        // Admin - Matakuliah
        Route::group(
            ['prefix' => 'matakuliahs', 'as' => 'matakuliahs.'],
            function () {
                Route::get('/', [MatakuliahController::class, 'indexAdmin'])->name('index');
                Route::get('/create', [MatakuliahController::class, 'create'])->name('create');
                Route::post('/store', [MatakuliahController::class, 'store'])->name('store');
                Route::get('/edit/{matakuliah:kode}', [MatakuliahController::class, 'edit'])->name('edit');
                Route::patch('/update/{matakuliah:kode}', [MatakuliahController::class, 'update'])->name('update');
                Route::get('/destroy/{matakuliah:kode}', [MatakuliahController::class, 'destroy'])->name('destroy');
                Route::get('/{matakuliah:kode}', [MatakuliahController::class, 'show'])->name('show');
            }
        );

        // Admin - Status Matakuliah
        Route::group(
            ['prefix' => 'status-matkuls', 'as' => 'status_matkuls.'],
            function () {
                Route::get('/', [StatusMatkulController::class, 'indexAdmin'])->name('index');
                Route::get('/create', [StatusMatkulController::class, 'create'])->name('create');
                Route::post('/store', [StatusMatkulController::class, 'store'])->name('store');
                Route::put('/update/{matakuliah:kode}', [StatusMatkulController::class, 'updateAndDelete'])->name('update_delete');
            }
        );

        // Admin - Fakultas
        Route::group(
            ['prefix' => 'fakultases', 'as' => 'fakultases.'],
            function () {
                Route::get('/', [FakultasController::class, 'indexAdmin'])->name('index');
                Route::get('/create', [FakultasController::class, 'create'])->name('create');
                Route::post('/store', [FakultasController::class, 'store'])->name('store');
                Route::get('/edit/{fakultas:kode}', [FakultasController::class, 'edit'])->name('edit');
                Route::patch('/update/{fakultas:kode}', [FakultasController::class, 'update'])->name('update');
                Route::get('/destroy/{fakultas:kode}', [FakultasController::class, 'destroy'])->name('destroy');
            }
        );

        // Admin - Jurusan
        Route::group(
            ['prefix' => 'jurusans', 'as' => 'jurusans.'],
            function () {
                Route::get('/', [JurusanController::class, 'indexAdmin'])->name('index');
                Route::get('/create', [JurusanController::class, 'create'])->name('create');
                Route::post('/store', [JurusanController::class, 'store'])->name('store');
                Route::get('/edit/{jurusan:kode}', [JurusanController::class, 'edit'])->name('edit');
                Route::patch('/update/{jurusan:kode}', [JurusanController::class, 'update'])->name('update');
                Route::get('/destroy/{jurusan:kode}', [JurusanController::class, 'destroy'])->name('destroy');
            }
        );

        // Admin - Program Studi
        Route::group(
            ['prefix' => 'program-studis', 'as' => 'program_studis.'],
            function () {
                Route::get('/', [ProgramStudiController::class, 'indexAdmin'])->name('index');
                Route::get('/create', [ProgramStudiController::class, 'create'])->name('create');
                Route::post('/store', [ProgramStudiController::class, 'store'])->name('store');
                Route::get('/edit/{program_studi:kode}', [ProgramStudiController::class, 'edit'])->name('edit');
                Route::patch('/update/{program_studi:kode}', [ProgramStudiController::class, 'update'])->name('update');
                Route::get('/destroy/{program_studi:kode}', [ProgramStudiController::class, 'destroy'])->name('destroy');
            }
        );

        // Admin - KRS
        Route::group(
            ['prefix' => 'krses', 'as' => 'krses.'],
            function () {
                Route::get('/', [KrsController::class, 'indexAdmin'])->name('index');
            }
        );

        // Admin - KHS
        Route::group(
            ['prefix' => 'khses', 'as' => 'khses.'],
            function () {
                Route::get('/', [KhsController::class, 'indexAdmin'])->name('index');
            }
        );
    }
);

// HALAMAN MAHASISWA
Route::group(
    ['middleware' => 'auth:mahasiswa', 'prefix' => 'mahasiswa', 'as' => 'mahasiswa.'],
    function () {
        Route::get('/', [MahasiswaController::class, 'index'])->name('index');
        Route::get('#profile', [MahasiswaController::class, 'index'])->name('profile');
        Route::get('/', [MahasiswaController::class, 'index'])->name('index');
        Route::patch('/updatePassword', [MahasiswaController::class, 'updatePassword'])->name('updatePassword');

        // Mahasiswa - KRS
        Route::group(
            ['prefix' => 'krses', 'as' => 'krses.'],
            function () {
                Route::post('/store', [KrsController::class, 'store'])->name('store');
                Route::get('/destroy/{krs:id}', [KrsController::class, 'destroy'])->name('destroy');
            }
        );
    }
);

// HALAMAN DOSEN
Route::group(
    ['middleware' => 'auth:dosen', 'prefix' => 'dosen', 'as' => 'dosen.'],
    function () {
        Route::get('/', [DosenController::class, 'index'])->name('index');
        Route::get('#profile', [DosenController::class, 'index'])->name('profile');
        Route::get('/', [DosenController::class, 'index'])->name('index');
        Route::patch('/updatePassword', [DosenController::class, 'updatePassword'])->name('updatePassword');
    }
);
