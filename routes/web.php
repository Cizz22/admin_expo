<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\VerifikasiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/', function() {
    return redirect(route('login'));
});

Route::get('/daftar-pembeli' ,[BookingController::class, 'index'])->name('pembeli');
Route::get('/verifikasi' ,[VerifikasiController::class, 'index'])->name('verifikasi');

require __DIR__.'/auth.php';
