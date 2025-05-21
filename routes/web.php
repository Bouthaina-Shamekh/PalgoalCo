<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\HostingController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/create-account', [HostingController::class, 'createAccount']);

require __DIR__.'/dashboard.php';
require __DIR__.'/client.php';
