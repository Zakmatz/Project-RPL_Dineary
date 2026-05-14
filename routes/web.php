<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome'); // Ini harus memanggil file welcome.blade.php
});

// Masukkan route login/register bawaan jika kamu pakai Laravel Breeze
require __DIR__ . '/auth.php';
