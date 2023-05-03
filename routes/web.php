<?php


use App\Models\Achat;
use App\Models\Dette;
use App\Models\Vente;
use App\Models\Depenses;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AchatController;
use App\Http\Controllers\DetteController;

use App\Http\Controllers\graphController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\VenteController;
use App\Http\Controllers\DepenseController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\RapportController;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;


Route::middleware('auth')->group(function(){
    Route::get('',[RouteController::class,'index'])->name('home');
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
    Route::resource('user',UserController::class)->middleware('is_admin','auth');
    Route::resource('achat',AchatController::class)->middleware('auth');
    Route::resource('depense',DepenseController::class);

    Route::get('rapport-annuel/{annee}',[RapportController::class,'rapportRapportAnnee'])->name('rapport-annuel');
    Route::get('rapport-mensuel/{mois}',[RapportController::class,'rapportRapportMois'])->name('rapport-mensuel');
    Route::get('rapport-journalier/{jour}',[RapportController::class,'rapportRapportJour'])->name('rapport-journalier');

});
Route::get('file',function(){
    $settings1 = [
        'chart_title' => 'vente par jour',
        'report_type' => 'group_by_date',
        'model' => 'App\Models\Rapport',
        'group_by_field' => 'date_rapport',
        'aggregate_function' => 'sum',
        'aggregate_field' => 'vente_jour',
        'group_by_period' => 'day',
        'chart_type' => 'line',
        'chart_color' => '255, 99, 132, 1',
        'continuous_time'       => true,
    ];
    $settings2 = [
        'chart_title' => 'depense par jour',
        'report_type' => 'group_by_date',
        'model' => 'App\Models\Rapport',
        'group_by_field' => 'date_rapport',
        'aggregate_function' => 'sum',
        'aggregate_field' => 'depense_jour',
        'group_by_period' => 'day',
        'chart_type' => 'line',
        'chart_color' => '0, 0, 255, 1',
        'continuous_time'       => true,
    ];

    $chart1 = new LaravelChart($settings1, $settings2);

    $orders = DB::table('ventes')
    ->select(DB::raw('DISTINCT DATE_FORMAT(date_vente, "%Y-%m-%d") AS date_vente'))
    ->get();
    $pdf = Pdf::loadView('rapport.home',[
        'orders' => $orders,
        'ventes' => Vente::where('deleted','=',0)->get(),
        'achats' => Achat::where('deleted','=',0)->get(),
        'depenses' => Depenses::where('deleted','=',0)->get(),
        'dettes' => Dette::all(),
        'charts' => $chart1
    ]);

    $pdf->setPaper('a4', 'landscape');
    return $pdf->download('rapport.pdf');
    return view('rapport.home',[
        'ventes' => Vente::all()
    ]);
});
