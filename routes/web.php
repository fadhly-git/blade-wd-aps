<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('apacoba', [\App\Http\Controllers\Pasien\RiwayatPasien::class, 'show_Json'])->name('apacoba');
Route::get('tes', function () { return 'tes oke'; });

require __DIR__.'/auth.php';
require __DIR__.'/pasien.php';
require __DIR__.'/dokter.php';

