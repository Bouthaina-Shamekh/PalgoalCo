<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\HomeController;


Route::get('dashboard', function () {
    return redirect()->route('dashboard.home');
});

Route::group([
    'middleware' => ['web', 'auth:user'],
    'prefix' => 'dashboard',
    'as' => 'dashboard.',
    'namespace' => 'App\Http\Controllers\Dashboard',
], function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/clients', function () {
        return view('dashboard.clients.index');
    });
    Route::get('/clients/create', function () {
        return view('dashboard.clients.add');
    });



});


