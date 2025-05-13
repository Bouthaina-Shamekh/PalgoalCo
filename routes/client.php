<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;



Route::get('client/', function () {
    return redirect()->route('client.home');

});

Route::group([
    'middleware' => ['web','auth:client'],
    'prefix' => 'client',
    'as' => 'client.',
    'namespace' => 'App\Http\Controllers',
], function () {

    Route::get('/home', function () {
        return view('client.index');
    })->name('home');

    });