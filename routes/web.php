<?php

use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

$idRegex = '[0-9]+';
$slugRegex = '[0-9a-z\-]+';

Route::get('/', [HomeController::class, 'index'])->name('app.home');
Route::get('/biens', [\App\Http\Controllers\PropertyController::class, 'index'])->name('property.index');
Route::get('/biens/{slug}-{property}', [\App\Http\Controllers\PropertyController::class, 'show'])->name('property.show')->where([
    'property' => $idRegex,
    'slug' => $slugRegex,
]);

Route::post('/biens/{property}/contact', [App\Http\Controllers\PropertyController::class, 'contact'])->name('property.contact')->where([
    'property' => $idRegex,
]);

Route::prefix('/')->controller(AuthController::class)->group(function () {
    Route::get('login', 'login')->middleware('guest')->name('login');
    Route::get('register', 'register')->middleware('guest')->name('register');

    Route::post('login', 'doLogin');
    Route::post('register', 'doRegister');
    Route::delete('logout', 'logout')->middleware('auth')->name('logout');
});

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('property', PropertyController::class)->except(['show']);
    Route::resource('option', OptionController::class)->except(['show']);
});
