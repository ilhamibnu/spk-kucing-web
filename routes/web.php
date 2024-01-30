<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NilaiKeyakinanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\DetailPenyakitController;

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
Route::get('/', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

# Dashboard Controller
Route::get('/dashboard', [DashboardController::class, 'index']);

# Nilai Keyakinan Controller
Route::get('/nilai-keyakinan', [NilaiKeyakinanController::class, 'index']);
Route::post('/nilai-keyakinan', [NilaiKeyakinanController::class, 'store']);
Route::put('/nilai-keyakinan/{id}', [NilaiKeyakinanController::class, 'update']);
Route::delete('/nilai-keyakinan/{id}', [NilaiKeyakinanController::class, 'destroy']);

# Penyakit Controller
Route::get('/penyakit', [PenyakitController::class, 'index']);
Route::post('/penyakit', [PenyakitController::class, 'store']);
Route::put('/penyakit/{id}', [PenyakitController::class, 'update']);
Route::delete('/penyakit/{id}', [PenyakitController::class, 'destroy']);

# Gejala Controller
Route::get('/gejala', [GejalaController::class, 'index']);
Route::post('/gejala', [GejalaController::class, 'store']);
Route::put('/gejala/{id}', [GejalaController::class, 'update']);
Route::delete('/gejala/{id}', [GejalaController::class, 'destroy']);

# Detail Penyakit Controller
Route::get('/detail-penyakit/{id}', [DetailPenyakitController::class, 'index']);
Route::post('/detail-penyakit', [DetailPenyakitController::class, 'store']);
Route::put('/detail-penyakit/{id}', [DetailPenyakitController::class, 'update']);
Route::delete('/detail-penyakit/{id}', [DetailPenyakitController::class, 'destroy']);
