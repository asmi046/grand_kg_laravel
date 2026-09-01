<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PriceOfferController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
Route::get('/prices', [PriceOfferController::class, 'index'])->name('prices.index');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('services.show');
