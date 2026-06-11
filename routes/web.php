<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| USER CONTROLLERS
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;

/*
|--------------------------------------------------------------------------
| ADMIN CONTROLLERS
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PartnerController;

/*
|--------------------------------------------------------------------------
| USER AREA
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/profil', [HomeController::class, 'profil'])
    ->name('profil');

Route::get('/katalog', [HomeController::class, 'katalog'])
    ->name('katalog');

Route::get('/bantuan', [HomeController::class, 'bantuan'])
    ->name('bantuan');

Route::get('/contact', [HomeController::class, 'kontak'])
    ->name('kontak');

/*
|--------------------------------------------------------------------------
| EVENT FLOW
|--------------------------------------------------------------------------
*/

Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');

Route::get('/checkout/{event}', [EventController::class, 'checkout'])
    ->name('checkout');

Route::post('/checkout/{event}/process', [EventController::class, 'processCheckout'])
    ->name('checkout.process');

Route::get('/my-ticket', [EventController::class, 'ticket'])
    ->name('ticket');

/*
|--------------------------------------------------------------------------
| ADMIN AREA
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get('/', [DashboardController::class, 'index'])
        ->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | CRUD EVENT
    |--------------------------------------------------------------------------
    */

    Route::resource('events', AdminEventController::class);

    /*
    |--------------------------------------------------------------------------
    | CRUD CATEGORY
    |--------------------------------------------------------------------------
    */

    Route::resource('categories', CategoryController::class);

    /*
    |--------------------------------------------------------------------------
    | CRUD PARTNER
    |--------------------------------------------------------------------------
    */

    Route::resource('partners', PartnerController::class);

    /*
    |--------------------------------------------------------------------------
    | TRANSACTIONS
    |--------------------------------------------------------------------------
    */

    Route::get('/transactions', [TransactionController::class, 'index'])
        ->name('transactions.index');
});