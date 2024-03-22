<?php

use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('home');
// });
Route::get("/", [AppController::class, 'index'])->name('home');
Route::get("/getsurah", [AppController::class, 'getSurah'])->name('getsurah');
Route::get("/baca/surat/{nomor}", [AppController::class, 'baca'])->name('baca');
