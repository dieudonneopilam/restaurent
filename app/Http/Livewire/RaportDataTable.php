<?php

namespace App\Http\Livewire;

use App\Models\Achat;
use App\Models\Dette;
use App\Models\Vente;
use App\Models\Caisse;
use App\Models\Produit;
use App\Models\Rapport;
use Livewire\Component;
use App\Models\Depenses;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class RaportDataTable extends Component
{
    use WithPagination;

    public $montant_vente_valide_Fc;
    public $montant_vente_valide_Usd;
    public $montant_vente_invalide_Fc;

    public $montant_dette_valide_Fc;
    public $montant_dette_invalide_Fc;
    public $montant_dette_valide_usd;
    public $montant_dette_invalide_Usd;


    public $montant_achats;

    public $montant_depenses_Fc;
    public $montant_depenses_usd;

    public $reste_valides;
    public $reste_invalides;
    public $dateReporte;

    public $dateSearch;

    public $searchRapport;
    public $search = '';
    public $nbpage;


    public $rules = [
        'search' => ['required'],
        'nbpage' => ['required'],
        'searchRapport' => ['required']
    ];

    public function mount(){
        $this->dateReporte = date(now());
        $this->dateReporte = date('Y-m-d');
        $this->search = '';
        $this->nbpage = 5;
    }
    public function updatingSearch($value){
        $this->dateSearch = $value;
    }
    public function render()
    {
        $montant_vente_valide_Fc = 0;
        $montant_vente_valide_Usd = 0;
        $montant_vente_invalide_Fc = 0;
        $montant_vente_invalide_Usd = 0;
        $ventes = Vente::where('date_vente', 'LIKE', "%$this->searchRapport%")->where('deleted','=',0)->where('devise_prix','=','Fc')->get();
        foreach($ventes as $vente){
            if ($vente->validate == 1) {
                $montant_vente_valide_Fc = $montant_vente_valide_Fc + $vente->prix_vente * $vente->qte_vente;
            }else{
                $montant_vente_invalide_Fc = $montant_vente_invalide_Fc + $vente->prix_vente * $vente->qte_vente;
            }
        }

        $ventes = Vente::where('date_vente', 'LIKE', "%$this->searchRapport%")->where('deleted','=',0)->where('devise_prix','=','$')->get();
        foreach($ventes as $vente){
            if ($vente->validate == 1) {
                $montant_vente_valide_Usd = $montant_vente_valide_Usd + $vente->prix_vente * $vente->qte_vente;
            }else{
                $montant_vente_invalide_Usd = $montant_vente_invalide_Usd + $vente->prix_vente * $vente->qte_vente;
            }
        }

        $dettes = Dette::where('date_dette', 'LIKE', "%$this->searchRapport%")->where('devise_prix','=','Fc')->where('deleted','=',0)->get();

        $montant_dette_valide_Fc = 0;
        $montant_dette_invalide_Fc = 0;

        foreach($dettes as $dette){

            if ($dette->payed == 1) {
                $montant_dette_valide_Fc = $montant_dette_valide_Fc + $dette->prix_vente * $dette->qte_dette;
            }else{
                $montant_dette_invalide_Fc = $montant_dette_invalide_Fc + $dette->prix_vente * $dette->qte_dette;
            }
        }

        $dettes = Dette::where('date_dette', 'LIKE', "%$this->searchRapport%")->where('devise_prix','=','Fc')->where('deleted','=',0)->get();
        $montant_dette_valide_Usd = 0;
        $montant_dette_invalide_Usd = 0;

        foreach($dettes as $dette){

            if ($dette->payed == 1) {
                $montant_dette_valide_Usd = $montant_dette_valide_Usd + $dette->prix_vente * $dette->qte_dette;
            }else{
                $montant_dette_invalide_Usd = $montant_dette_invalide_Usd + $dette->prix_vente * $dette->qte_dette;
            }
        }

        $depense = Depenses::where('date_depense', 'LIKE', "%$this->searchRapport%")->where('devise_depense','=','Fc')->where('deleted','=',0)->get();
        $montant_depenses_Fc = $depense->sum('montant');

        $depense = Depenses::where('date_depense', 'LIKE', "%$this->searchRapport%")->where('devise_depense','=','$')->where('deleted','=',0)->get();
        $montant_depenses_Usd = $depense->sum('montant');


        $achats = Achat::where('date_achat', 'LIKE', "%$this->searchRapport%")->where('deleted','=',0)->get();
        $montant_achat = $achats->sum('prix_achat');

        $dettes = Dette::OrderBy('date_dette','desc')->where('date_dette', 'LIKE', "%$this->search%")->where('deleted','=',0)->paginate($this->nbpage);


        $this->montant_vente_valide_Fc = $montant_vente_valide_Fc;
        $this->montant_vente_invalide_Fc = $montant_vente_invalide_Fc;

        $this->montant_vente_valide_Usd = $montant_vente_valide_Usd;
        $this->montant_vente_invalide_Usd = $montant_vente_invalide_Usd;

        $this->montant_dette_valide_Fc = $montant_dette_valide_Fc;
        $this->montant_dette_valide_Usd = $montant_dette_valide_Usd;

        $this->montant_dette_invalide_Fc = $montant_dette_invalide_Fc;
        $this->montant_dette_invalide_Usd = $montant_dette_invalide_Usd;

        $this->montant_achats = $montant_achat;
        $this->montant_depenses_Fc = $montant_depenses_Fc;
        $this->montant_depenses_Usd = $montant_depenses_Usd;

        $this->reste_valides_Fc = $this->montant_vente_valide_Fc + $this->montant_dette_valide_Fc - $this->montant_depenses_Fc;
        $this->reste_valides_Usd = $this->montant_vente_valide_Usd + $this->montant_dette_valide_Usd - $this->montant_depenses_Usd;

        $this->reste_invalides_Fc = $this->montant_vente_invalide_Fc + $this->montant_dette_invalide_Fc;
        $this->reste_invalides_Usd = $this->montant_vente_invalide_Usd + $this->montant_dette_invalide_Usd;

        $is_report = Rapport::where("date_rapport", "LIKE", "%$this->searchRapport%")->first();


        return view('livewire.raport-data-table',[
            'montant_vente_valide_Fc' => $montant_vente_valide_Fc,
            'montant_vente_valide_Usd' => $montant_vente_valide_Usd,
            'montant_vente_invalide_Fc' => $montant_vente_invalide_Fc,
            'montant_dette_valide_Fc' => $montant_dette_valide_Fc,
            'montant_dette_valide_Usd' => $montant_dette_valide_Usd,
            'montant_dette_invalide_Fc' => $montant_dette_invalide_Fc,
            'montant_dette_invalide_usd' => $montant_dette_invalide_Usd,
            'montant_achat' => $montant_achat,
            'montant_depenses_Fc' => $montant_depenses_Fc,
            'montant_depenses_Usd' => $montant_depenses_Usd,
            'dettes' => $dettes,
            'rapports' => Rapport::where('date_rapport','LIKE','%'.$this->search.'%')->orderBy('date_rapport','desc')->paginate($this->nbpage),
            'is_report' => $is_report,
            'ventes' => $this->vente()
        ]);
    }

    public function deleteVenteUnValide($id){
        $dette = Dette::findOrFail($id);
        $dette->update([
            'deleted' => 1,
            'date_deleted' => now()
        ]);
        $produit = Produit::findOrFail($dette->produit_id);
        $produit->update([
            'qte' => $produit->qte + $dette->qte_dette
        ]);
    }

    public function valider($id){
        $rapport = Rapport::create([
            'vente_jour' => $this->montant_vente_valide_Fc,
            'vente_non_payer' => $this->montant_vente_invalide_Fc,
            'depense_jour' => $this->montant_depenses_Fc,
            'achat_jour' => $this->montant_achats,
            'dette_jour' => $this->montant_dette_valide_Fc,
            'dette_non_payer' => $this->montant_dette_invalide_Fc,
            'user_id' => Auth::user()->id,
            'date_rapport' => $this->searchRapport
        ]);

        Caisse::create([
            'rapport_id' => $rapport->id,
            'date_rapport' => $rapport->date_rapport,
            'argent_entree' => $this->montant_vente_valide_Fc + $this->montant_dette_valide_Fc - $this->montant_achats - $this->montant_depenses_Fc
        ]);

        session()->flash('message','mise a jour rapport effectue avec success');
    }

    public function updatereport($idReport){

        $rapport = Rapport::findOrFail($idReport);

        $rapport->update([
            'vente_jour' => $this->montant_vente_valide_Fc,
            'vente_non_payer' => $this->montant_vente_invalide_Fc,
            'depense_jour' => $this->montant_depenses_Fc,
            'achat_jour' => $this->montant_achats,
            'dette_jour' => $this->montant_dette_valide_Fc,
            'dette_non_payer' => $this->montant_dette_invalide_Fc,
            'user_id' => Auth::user()->id,
            'date_rapport' => $this->searchRapport
        ]);

        $caisse = Caisse::where('rapport_id','=',$rapport->id)->first();

        if($caisse){
            $caisse->update([
                'rapport_id' => $rapport->id,
                'date_rapport' => $rapport->date_rapport,
                'argent_entree' => $this->montant_vente_valide_Fc + $this->montant_dette_valide_Fc - $this->montant_depenses_Fc
            ]);
        }else{
            Caisse::create([
                'rapport_id' => $rapport->id,
                'date_rapport' => $rapport->date_rapport,
                'argent_entree' => $this->montant_vente_valide_Fc + $this->montant_dette_valide_Fc - $this->montant_depenses_Fc
            ]);
        }

        session()->flash('message','mise a jour rapport effectue avec success');

    }
    public function vente(){

    }

    public function printReportAnnee(){
        return redirect()->route('rapport-annuel', ['annee' => $this->search]);
    }
    public function printReportMois(){
        return redirect()->route('rapport-mensuel', ['mois' => $this->search]);
    }
    public function printReportjour(){
        return redirect()->route('rapport-journalier', ['jour' => $this->search]);
    }
}
