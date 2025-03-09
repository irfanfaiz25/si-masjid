<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.main');
});

Route::get('/dashboard', function () {
    return view('contents.dashboard-zakat');
})->name('dashboard.index');

Route::get('/zakat/dashboard', function () {
    return view('contents.dashboard-zakat');
})->name('dashboard-zakat.index');

Route::get('/zakat/pemberi', function () {
    return view('contents.pemberi');
})->name('pemberi.index');

Route::get('/zakat/penerima', function () {
    return view('contents.penerima');
})->name('penerima.index');