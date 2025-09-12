<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HewansController;

Route::get('/tambah-hewan', [HewansController::class, 'tambahHewan']);
Route::get('/kesayangan/{order?}', [HewansController::class, 'kesayangan']);
Route::get('/ganti-persia', [HewansController::class, 'gantiPersia']);
Route::get('/hitung-jenis', [HewansController::class, 'hitungJenis']);
Route::get('/palindrome', [HewansController::class, 'palindrome']);
Route::get('/jumlah-genap', [HewansController::class, 'jumlahGenap']);
Route::get('/anagram/{str1}/{str2}', [HewansController::class, 'cekAnagram']);

Route::get('/hewan', [HewansController::class, 'index']);
