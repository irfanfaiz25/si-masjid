<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.main');
});

Route::get('/pemberi-zakat', function () {
    return view('contents.pemberi');
})->name('pemberi.index');

Route::get('/penerima-zakat', function () {
    return view('contents.penerima');
})->name('penerima.index');