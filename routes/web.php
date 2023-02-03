<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriProdukController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\PesananMasukController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProdukOrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransaksiController;
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
    return redirect()->route('login');
});

Route::get('/login_page', [AuthController::class, 'login_page'])->name('login_page');
Route::post('/login_page/post', [AuthController::class, 'login_page_post'])->name('login_page.post');

Route::get('/login_qrcode', [AuthController::class, 'login_qrcode'])->name('login');
Route::post('/login_qrcode/post', [AuthController::class, 'login_qrcode_post'])->name('login_qrcode.post');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth', 'checkRole:owner,dapur,kasir,meja']], function(){
    Route::get('/dashboard/index', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('/kategori_produk', [KategoriProdukController::class, 'index'])->name('kategoriproduk.index');
    Route::post('/kategori_produk/insert', [KategoriProdukController::class, 'insert'])->name('kategoriproduk.insert');
    Route::post('/kategori_produk/update/{id}', [KategoriProdukController::class, 'update'])->name('kategoriproduk.update');
    Route::get('/kategori_produk/destroy/{id}', [KategoriProdukController::class, 'destroy'])->name('kategoriproduk.destroy');

    Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
    Route::post('/produk/insert', [ProdukController::class, 'insert'])->name('produk.insert');
    Route::post('/produk/update_detail/{id}', [ProdukController::class, 'update_detail'])->name('produk.update_detail');
    Route::post('/produk/update_gambar/{id}', [ProdukController::class, 'update_gambar'])->name('produk.update_gambar');
    Route::get('/produk/destroy_gambar/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');

    Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
    Route::post('/pegawai/insert', [PegawaiController::class, 'insert'])->name('pegawai.insert');
    Route::post('/pegawai/change_password/{id}', [PegawaiController::class, 'change_password'])->name('pegawai.change_password');
    Route::post('/pegawai/change_role/{id}', [PegawaiController::class, 'change_role'])->name('pegawai.change_role');

    Route::get('/meja', [MejaController::class, 'index'])->name('meja.index');
    Route::post('/meja/insert', [MejaController::class, 'insert'])->name('meja.insert');
    Route::post('/meja/edit/{id}', [MejaController::class, 'edit'])->name('meja.edit');

    Route::get('/order', [PesananController::class, 'index'])->name('order.index');
    Route::get('/order/search', [PesananController::class, 'index'])->name('order.search');
    Route::get('/order/add/{id}', [PesananController::class, 'add'])->name('order.add');
    Route::get('/order/checkout', [PesananController::class, 'checkout'])->name('order.checkout');
    Route::get('/order/checkout/delete/{id}', [PesananController::class, 'delete'])->name('order.delete');
    Route::post('/order/checkout/update_jumlah', [PesananController::class, 'update_jumlah'])->name('order.update_jumlah');
    Route::post('/order/checkout/proses', [PesananController::class, 'proses'])->name('order.proses');

    Route::get('/pesanan', [ProdukOrderController::class, 'index'])->name('pesanan.index');
    Route::get('/pesanan/pesanan_dalam_antrian/{id}', [ProdukOrderController::class, 'pesanan_dalam_antrian'])->name('pesanan.pesanan_dalam_antrian');
    Route::get('/pesanan/pesanan_sedang_diolah/{id}', [ProdukOrderController::class, 'pesanan_sedang_diolah'])->name('pesanan.pesanan_sedang_diolah');
    Route::get('/pesanan/pesanan_diantar/{id}', [ProdukOrderController::class, 'pesanan_diantar'])->name('pesanan.pesanan_diantar');
    Route::get('/pesanan/pesanan_selesai/{id}', [ProdukOrderController::class, 'pesanan_selesai'])->name('pesanan.pesanan_selesai');
    Route::get('/pesanan/pesanan_berakhir/{id}', [ProdukOrderController::class, 'pesanan_berakhir'])->name('pesanan.pesanan_berakhir');

    Route::get('/pesanan_masuk', [PesananMasukController::class, 'index'])->name('pesananmasuk.index');
    Route::post('/pesanan_masuk/pesanan_berakhir', [PesananMasukController::class, 'pesanan_berakhir'])->name('pesananmasuk.pesanan_berakhir');

    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/change_password', [ProfileController::class, 'change_password'])->name('profile.change_password');
    Route::post('/profile/change_avatar', [ProfileController::class, 'change_avatar'])->name('profile.change_avatar');
});
