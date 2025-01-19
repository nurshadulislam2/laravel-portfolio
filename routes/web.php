<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BackController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class, 'index'])->name('/');
Route::post('/contact/store', [FrontController::class, 'contact'])->name('contact.store');

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/dashboard', [BackController::class, 'dashboard'])->name('dashboard');
    Route::get('/header', [HeaderController::class, 'index'])->name('header.index');
    Route::put('/header/update/{id}', [HeaderController::class, 'update'])->name('header.update');

    Route::resource('portfolio', PortfolioController::class);

    // about
    Route::get('/about', [AboutController::class, 'index'])->name('about.index');
    Route::put('/about/update/{id}', [AboutController::class, 'update'])->name('about.update');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
