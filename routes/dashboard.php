<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\ClientComponent;
use App\Http\Controllers\Dashboard\HomeController;

Route::get('dashboard', function () {
    return redirect()->route('dashboard.home');
});

Route::group([
    'middleware' => ['web', 'auth:user'],
    'prefix' => 'dashboard',
    'as' => 'dashboard.',
], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/clients', [HomeController::class, 'clients'])->name('clients');
    Route::get('/subscriptions', [HomeController::class, 'subscriptions'])->name('subscriptions');
    Route::get('/sites', [HomeController::class, 'sites'])->name('sites');
    Route::get('/domains', [HomeController::class, 'domains'])->name('domains');
    Route::get('/plans', [HomeController::class, 'plans'])->name('plans');
});


