<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use App\Models\Dette;
use App\Models\Vente;
use App\Models\Rapport;
use App\Models\Depenses;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
        $year = '';
        for ($i=0; $i < 4; $i++) {
            $year = $year .''. $annee[$i];
        }

        $pdf = Pdf::loadView('rapport.home',[
            'rapports' => Rapport::where('date_rapport','LIKE','%'.$year.'%')->OrderBy('date_rapport','asc')->get()
        ]);

    $pdf->setPaper('a4', 'landscape');
    return $pdf->download('rapport.pdf');
    }

    public function rapportRapportMois($mois){
        $mth = '';
        for ($i=0; $i < 7; $i++) {
            $mth = $mth .''. $mois[$i];
        }

        Carbon::setLocale('fr');
        // Créer une instance de Carbon à partir de la date du rapport
        $date = Carbon::parse($mth);
        // Afficher le mois en toutes lettres

        $pdf = Pdf::loadView('rapport.home',[
            'rapports' => Rapport::where('date_rapport','LIKE','%'.$mth.'%')->OrderBy('date_rapport','asc')->get()
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
