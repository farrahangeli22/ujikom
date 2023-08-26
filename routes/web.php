<?php

use App\Http\Controllers\HotelController;
use App\Http\Controllers\PemesananController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

//buat tampilin halaman hotel
Route::get('/', [HotelController::class, 'viewHome'])->name('hotel.home');

//buat tampilin daftar harga
Route::get('/daftar-harga', [HotelController::class, 'viewDaftarHarga'])->name('hotel.daftar-harga');

//buat tentang kami
Route::get('/tentang-kami', [HotelController::class, 'viewTentangKami'])->name('hotel.tentang-kami');

//buat pemesanan
Route::get('/form-pemesanan', [PemesananController::class, 'viewFormPemesanan'])->name('pemesanan.form-pemesanan');
Route::post('/form-pemesanan', [PemesananController::class, 'createPemesanan'])->name('pemesanan.form-pemesanan');



