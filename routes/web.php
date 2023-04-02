<?php

use App\Http\Controllers\AchatController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VenteController;
use Illuminate\Support\Facades\Route;

Route::get('',[RouteController::class,'index'])->name('home');
Route::resource('produit',ProduitController::class);
Route::resource('vente',VenteController::class);
Route::resource('user',UserController::class);
Route::resource('achat',AchatController::class);
