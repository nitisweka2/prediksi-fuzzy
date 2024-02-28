<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PrediksiController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\HasilController;
use App\Http\Controllers\IndexController;

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

Route::get('/',  [IndexController::class, 'index']);
Route::get('/produk',  [ProdukController::class, 'produk'])->name('produk');

Route::get('/produk/add',  [ProdukController::class, 'add'])->name('produk.add');
Route::post('/produk/insert', [ProdukController::class, 'insert'])->name('produk.insert');  
Route::get('/produk/edit/{id_periode}', [ProdukController::class, 'edit'])->name('produk.edit');
Route::post('/produk/update/{id_periode}', [ProdukController::class, 'update'])->name('produk.update');
Route::get('/produk/delete/{id_periode}', [ProdukController::class, 'delete'])->name('produk.delete');
//Route::get('/prediksi', 'PrediksiController@hitungMiuSedikit');

//pengambilan tanggal
Route::post('/prediksi/proses', [PrediksiController::class, 'prediksi'])->name('prediksi.proses');
//Route::get('/prediksi/milih', [PrediksiController::class, 'produk'])->name('produk');

//penyimpanan hasil prediksi ke tabel training
// Menampilkan halaman form prediksi
Route::get('/prediksi', [TrainingController::class, 'training'])->name('halaman.prediksi');



//cobainsert
Route::get('/insert_training', [TrainingController::class, 'create'])->name('training.create');
Route::post('/insert_training', [TrainingController::class, 'store'])->name('training.store');
//manual
Route::post('/masukkan', [PrediksiController::class, 'inputData'])->name('masukkan');

// Tambahkan route untuk mengakses aksi simpan data pada file web.php
Route::post('/simpan-data', 'TrainingController@simpanData')->name('simpan.data');
Route::post('/simpan-data', [PrediksiController::class, 'simpanData'])->name('simpan.data');

//Route::post('/produk/insert',  [ProdukController::class, 'insert']);
Route::get('/training',  [TrainingController::class, 'training'])->name('training');
Route::get('/prediksi',  [PrediksiController::class, 'prediksi']);
Route::get('/hasil',  [HasilController::class, 'hasil']);
Route::get('/training/delete/{id_training}', [TrainingController::class, 'delete'])->name('training.delete');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('home');
