<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use App\Models\Dette;
use App\Models\Vente;
use App\Models\Depenses;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class RapportController extends Controller
{
    // rapport de la table vente du caissier

    public function rapportVenteAnnee($annee){

    }

    public function rapportVenteMoth($mois){

    }

    public function rapportVenteJour($jour){

    }

    // rapport de la table achat

    public function rapportAchatAnnee($annee){

    }

    public function rapportAchatMoth($mois){

    }

    public function rapportAchatJour($jour){

    }

    // rapport de la table depenses

    public function rapportDepenseAnnee($annee){

    }

    public function rapportDepenseMoth($mois){

    }

    public function rapportDepenseJour($jour){

    }

    // rapport de la table rapport du caissier

    public function rapportRapportAnnee($annee){
        dd($annee);
    }

    public function rapportRapportMois($mois){

        $orders = DB::table('ventes')
        ->select(DB::raw('DISTINCT DATE_FORMAT(date_vente, "%Y-%m-%d") AS date_vente'))
        ->where('date_vente', 'like', '%'.$mois.'%')
        ->get();

        $pdf = Pdf::loadView('rapport.home',[
            'orders' => $orders,
            'ventes' => Vente::where('deleted','=',0)->get(),
            'achats' => Achat::where('deleted','=',0)->get(),
            'depenses' => Depenses::where('deleted','=',0)->get(),
            'dettes' => Dette::all(),
            'rapports' => Rapport::where('date_rapport','LIKE','%'.$this->search.'%')->orderBy('date_rapport','desc')
        ]);

    $pdf->setPaper('a4', 'landscape');
    return $pdf->download('rapport.pdf');
    }

    public function rapportRapportJour($jour){
        dd($jour);
    }

    // rapport de la table Caisse du caissier

    public function rapportCaisseAnnee($annee){

    }

    public function rapportCaisseMois($mois){

    }

    public function rapportCaisseJour($jour){

    }

    // rapport de la table Caisse du caissier

    public function rapportDetteAnnee($annee){

    }

    public function rapportDetteMois($mois){

    }

    public function rapportDetteJour($jour){

    }
}
