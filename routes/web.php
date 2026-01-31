<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DetailJenisPembayaranController;
use App\Http\Controllers\Admin\JenisPembayaranController;
use App\Http\Controllers\Admin\PaketController;
use App\Http\Controllers\Admin\PelangganController;
use App\Http\Controllers\Admin\PemesananController;
use App\Http\Controllers\Admin\PengirimanController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\PelangganAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Pelanggan\OrderController;
use App\Http\Controllers\Pelanggan\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [PelangganAuthController::class, 'showLogin'])->name('pelanggan.login');
Route::post('/login', [PelangganAuthController::class, 'login'])->name('pelanggan.login.submit');
Route::get('/register', [PelangganAuthController::class, 'showRegister'])->name('pelanggan.register');
Route::post('/register', [PelangganAuthController::class, 'register'])->name('pelanggan.register.submit');
Route::post('/logout', [PelangganAuthController::class, 'logout'])->name('pelanggan.logout');

Route::get('/packages', [OrderController::class, 'paket'])->name('pelanggan.paket.index');
Route::get('/packages/{paket}', [OrderController::class, 'showPaket'])->name('pelanggan.paket.show');

Route::prefix('customer')->middleware('auth:pelanggan')->group(function () {
    Route::get('/dashboard', [OrderController::class, 'dashboard'])->name('pelanggan.dashboard');
    Route::get('/orders/create', [OrderController::class, 'create'])->name('pelanggan.pemesanan.create');
    Route::post('/orders', [OrderController::class, 'store'])->name('pelanggan.pemesanan.store');
    Route::get('/orders', [OrderController::class, 'riwayat'])->name('pelanggan.pemesanan.riwayat');
    Route::get('/orders/{pemesanan}', [OrderController::class, 'show'])->name('pelanggan.pemesanan.show');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('pelanggan.profil.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('pelanggan.profil.update');
});

Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::prefix('admin')->middleware(['auth', 'role:admin,owner,kurir'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('/packages', PaketController::class)->names('admin.paket');
    Route::resource('/payment-types', JenisPembayaranController::class)->except(['show'])->names('admin.jenis-pembayaran');
    Route::resource('/payment-details', DetailJenisPembayaranController::class)->except(['show'])->names('admin.detail-jenis-pembayaran');
    Route::resource('/customers', PelangganController::class)->except(['create', 'store'])->names('admin.pelanggan');
    Route::resource('/orders', PemesananController::class)
        ->parameters(['orders' => 'pemesanan'])
        ->except(['create', 'store'])
        ->names('admin.pemesanan');
    Route::resource('/shipments', PengirimanController::class)->except(['show'])->names('admin.pengiriman');
});
