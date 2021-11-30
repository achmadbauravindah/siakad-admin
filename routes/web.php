<?php

use App\Models\Admin;
use App\Models\Agama;
use App\Models\Dosen;
use App\Models\Khs;
use App\Models\Krs;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use App\Models\Program_studi;
use App\Models\Semester;
use App\Models\Status_matkul;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/test', function () {
    $status_matkuls = Status_matkul::all();
    $matakuliahs = Matakuliah::all();
    $semesters = Semester::all();
    $krses = Krs::all();
    $khses = Khs::all();

    $program_studis = Program_studi::all();
    $mahasiswas = Mahasiswa::all();
    return view('test', compact('status_matkuls', 'matakuliahs', 'semesters', 'krses', 'khses', 'program_studis', 'mahasiswas'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/admin/dashboard', function () {
    return view('auth.admin.dashboard.index');
});
