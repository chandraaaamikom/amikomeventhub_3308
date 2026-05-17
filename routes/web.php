<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\TransactionController;

// =============================================
// USER AREA - Menggunakan HomeController
// =============================================
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profil', [HomeController::class, 'profil'])->name('profil');
Route::get('/katalog', [HomeController::class, 'katalog'])->name('katalog');
Route::get('/bantuan', [HomeController::class, 'bantuan'])->name('bantuan');
Route::get('/contact', [HomeController::class, 'kontak'])->name('kontak');

// =============================================
// EVENT FLOW - Menggunakan EventController
// =============================================
Route::get('/event/detail', [EventController::class, 'show'])->name('events.show');
Route::get('/checkout', [EventController::class, 'checkout'])->name('checkout');
Route::get('/my-ticket', [EventController::class, 'ticket'])->name('ticket');

// =============================================
// ADMIN AREA
// =============================================
Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])
        ->name('dashboard');

    // CRUD EVENT
    Route::resource('events', AdminEventController::class);

    // TRANSAKSI
    Route::get('/transactions', [TransactionController::class, 'index'])
        ->name('transactions.index');
});