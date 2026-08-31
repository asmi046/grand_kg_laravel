<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PriceOfferController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
Route::get('/prices', [PriceOfferController::class, 'index'])->name('prices.index');
