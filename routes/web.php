<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\GolonganController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\AgamaController;
use App\Http\Controllers\jeniskelaminController;
use App\Http\Controllers\LaporanController;
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


Route::get('/',function(){
    return view('welcome',[
        "title"=>"Dashboard"
    ]);
    })->middleware('auth');
Route::resource('pegawai',PegawaiController::class);
Route::resource('golongan', GolonganController::class)->middleware('auth');
Route::resource('jabatan', JabatanController::class)->middleware('auth');
Route::resource('agama', AgamaController::class)->middleware('auth');
Route::resource('jeniskelamin', JeniskelaminController::class)->middleware('auth');

Route::resource('user',UserController::class)->except('destroy','create','show','update','edit');
Route::get('login',[LoginController::class,'loginView'])->name('login');
Route::post('login',[LoginController::class,'authenticate']);

Route::get('laporan', [LaporanController::class, 'index'])->name('laporan.index');