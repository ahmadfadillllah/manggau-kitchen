<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriProdukController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
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

Route::get('/login_page', [AuthController::class, 'login_page'])->name('login');
Route::post('/login_page/post', [AuthController::class, 'login_page_post'])->name('login_page.post');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth', 'checkRole:owner,meja']], function(){
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
    Route::get('/order/add/{id}', [PesananController::class, 'add'])->name('order.add');
    Route::get('/order/checkout', [PesananController::class, 'checkout'])->name('order.checkout');
    Route::get('/order/checkout/delete/{id}', [PesananController::class, 'delete'])->name('order.delete');
    Route::post('/order/checkout/update_jumlah', [PesananController::class, 'update_jumlah'])->name('order.update_jumlah');
    Route::post('/order/checkout/proses', [PesananController::class, 'proses'])->name('order.proses');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/change_password', [ProfileController::class, 'change_password'])->name('profile.change_password');
    Route::post('/profile/change_avatar', [ProfileController::class, 'change_avatar'])->name('profile.change_avatar');
});
