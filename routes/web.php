<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AchatController;
use App\Http\Controllers\DepenseController;
use App\Http\Controllers\DetteController;
use App\Http\Controllers\graphController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\VenteController;

use App\Http\Controllers\ProduitController;
use Barryvdh\DomPDF\Facade\Pdf;


Route::middleware('auth')->group(function(){
    Route::get('',[RouteController::class,'index'])->name('home')->middleware('auth');
    Route::get('/rapport',[RouteController::class,'rapport'])->name('rapport')->middleware('auth');
    Route::get('/ma-situation',[RouteController::class,'situation'])->name('situation')->middleware('auth');
    Route::get('/caisse',[RouteController::class,'caisse'])->name('caisse')->middleware('auth');
    Route::get('/login',[AuthController::class, 'login'])->name('login')->withoutMiddleware('auth');
    Route::post('/auth',[AuthController::class, 'auth'])->name('auth')->withoutMiddleware('auth');
    Route::get('/logout',[AuthController::class, 'logout'])->name('logout');
    Route::get('analytique-vente',[graphController::class, 'grapheRapport'])->name('analytic-vente');
    Route::get('analytique-vente-dette',[graphController::class, 'graphventedette'])->name('analytic-vente-dette');
    Route::get('analytique-depense',[graphController::class, 'graphedepense'])->name('analytic-depense');
    Route::get('analytique-achat',[graphController::class, 'graphachat'])->name('analytic-achat');
    Route::resource('produit',ProduitController::class);
    Route::resource('vente',VenteController::class);
    Route::resource('dette',DetteController::class);
    Route::resource('user',UserController::class)->middleware('auth');
    Route::resource('achat',AchatController::class)->middleware('auth');
    Route::resource('depense',DepenseController::class);
});
Route::get('file',function(){

    $pdf = Pdf::loadView('rapport.home');
    $pdf->setPaper('a4', 'landscape');
    return $pdf->download('rapport.pdf');

    return view('rapport.home');
});
