<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\DetailPenyakitController;
use App\Http\Controllers\SimulasiDiagnosaController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\AuthUserController;
use App\Http\Controllers\DiagnosaUserController;
use App\Http\Controllers\RiwayatUserController;


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

# Auth Controller
Route::get('/login', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware('IsLogin');
Route::post('/updateprofil', [AuthController::class, 'updateprofil'])->middleware('IsLogin', 'IsAdmin');

# Dashboard Controller
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('IsLogin', 'IsAdmin');

# Penyakit Controller
Route::get('/penyakit', [PenyakitController::class, 'index'])->middleware('IsLogin', 'IsAdmin');
Route::post('/penyakit', [PenyakitController::class, 'store'])->middleware('IsLogin', 'IsAdmin');
Route::put('/penyakit/{id}', [PenyakitController::class, 'update'])->middleware('IsLogin', 'IsAdmin');
Route::delete('/penyakit/{id}', [PenyakitController::class, 'destroy'])->middleware('IsLogin', 'IsAdmin');

# Gejala Controller
Route::get('/gejala', [GejalaController::class, 'index'])->middleware('IsLogin', 'IsAdmin');
Route::post('/gejala', [GejalaController::class, 'store'])->middleware('IsLogin', 'IsAdmin');
Route::put('/gejala/{id}', [GejalaController::class, 'update'])->middleware('IsLogin', 'IsAdmin');
Route::delete('/gejala/{id}', [GejalaController::class, 'destroy'])->middleware('IsLogin', 'IsAdmin');

# Detail Penyakit Controller
Route::get('/detail-penyakit/{id}', [DetailPenyakitController::class, 'index'])->middleware('IsLogin', 'IsAdmin');
Route::post('/detail-penyakit', [DetailPenyakitController::class, 'store'])->middleware('IsLogin', 'IsAdmin');
Route::put('/detail-penyakit/{id}', [DetailPenyakitController::class, 'update'])->middleware('IsLogin', 'IsAdmin');
Route::delete('/detail-penyakit/{id}', [DetailPenyakitController::class, 'destroy'])->middleware('IsLogin', 'IsAdmin');

# Simulasi Diagnosa Controller
Route::get('/simulasi-diagnosa', [SimulasiDiagnosaController::class, 'index'])->middleware('IsLogin', 'IsAdmin');
Route::post('/simulasi-diagnosa', [SimulasiDiagnosaController::class, 'diagnosa'])->middleware('IsLogin', 'IsAdmin');

# Riwayat Controller
Route::get('/riwayat', [RiwayatController::class, 'index'])->middleware('IsLogin', 'IsAdmin');
Route::get('/riwayat/detail/{id}', [RiwayatController::class, 'detail'])->middleware('IsLogin', 'IsAdmin');
Route::get('/riwayat/print/{id}', [RiwayatController::class, 'print'])->middleware('IsLogin', 'IsAdmin');
Route::delete('/riwayat/{id}', [RiwayatController::class, 'destroy'])->middleware('IsLogin', 'IsAdmin');


# Dashboard User Controller
Route::get('/', [DashboardUserController::class, 'index']);
Route::get('/index', [DashboardUserController::class, 'index']);

# Auth User Controller
Route::get('/auth/google', [AuthUserController::class, 'redirect']);
Route::get('/auth/google/callback', [AuthUserController::class, 'GoogleCallback']);
Route::get('/auth/logout', [AuthUserController::class, 'logout'])->middleware('IsLogin', 'IsUser');
Route::get('/profil', [AuthUserController::class, 'profil'])->middleware('IsLogin', 'IsUser');
Route::post('/auth/profil', [AuthUserController::class, 'updateprofiluser'])->middleware('IsLogin', 'IsUser');

# Diagnosa User Controller
Route::get('/diagnosa-user', [DiagnosaUserController::class, 'index'])->middleware('IsLogin', 'IsUser');
Route::post('/diagnosa-user', [DiagnosaUserController::class, 'diagnosa'])->middleware('IsLogin', 'IsUser');

# Riwayat User Controller
Route::get('/riwayat-user', [RiwayatUserController::class, 'index'])->middleware('IsLogin', 'IsUser');
Route::get('/riwayat-user/detail/{id}', [RiwayatUserController::class, 'detail'])->middleware('IsLogin', 'IsUser');
Route::get('/riwayat-user/print/{id}', [RiwayatUserController::class, 'printuser'])->middleware('IsLogin', 'IsUser');
