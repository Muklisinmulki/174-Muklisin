<?php

use Illuminate\Support\Facades\Route;

<<<<<<< HEAD
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\LoginFormController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\BuyFormController;
// routes/web.php

use App\Http\Controllers\PurchaseController;

Route::post('/buy-form-submit', [PurchaseController::class, 'store'])->name('buy-form-submit');

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::post('/registrasi', [RegistrasiController::class, 'store'])->name('register');
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/client', [ClientController::class, 'index'])->name('client.index');
Route::post('/login', [LoginFormController::class, 'store'])->name('login');

Route::get('/developer', [DeveloperController::class, 'index'])->name('develop.index');
Route::get('/developer/dashboard', [DeveloperController::class, 'dashboard'])->name('developer.dashboard');
Route::get('/developer/analytics', [DeveloperController::class, 'analytics'])->name('developer.analytics');
Route::get('/developer/settings', [DeveloperController::class, 'settings'])->name('developer.settings');
Route::get('/developer/members', [DeveloperController::class, 'members'])->name('developer.members');
Route::get('/developer/history', [DeveloperController::class, 'history'])->name('developer.history');


// Route untuk menyimpan data properti
Route::post('/properti', [PropertyController::class, 'store'])->name('properti');
Route::get('/properties', [PropertyController::class, 'getProperties'])->name('properties');


Route::get('/client/buy', [ClientController::class, 'buy'])->name('client.buy');
Route::get('/client/pay', [ClientController::class, 'pay'])->name('client.pay');
Route::get('/client/doc', [ClientController::class, 'doc'])->name('client.doc');

Route::get('/success-page', function () {
    return view('client.index'); // Ganti 'success' dengan nama view yang sesuai dengan halaman sukses Anda
})->name('success-page');
=======
Route::get('/', function () {
    return view('home');
});
>>>>>>> ad09c1548b0f0f80fedec977885a536e811cfb98
