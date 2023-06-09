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

    public $montant_vente_valides;
    public $montant_vente_invalides;
    public $montant_dette_valides;
    public $montant_dette_invalides;
    public $montant_achats;
    public $montant_depensess;
    public $reste_valides;
    public $reste_invalides;

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
        $this->searchRapport = date(now());
        $this->searchRapport = date('Y-m-d');
        $this->search = '';
        $this->nbpage = 5;
    }
    public function updatingSearch($value){
        $this->dateSearch = $value;
    }
    public function render()
    {
        $montant_vente_valide = 0;
        $montant_vente_invalide = 0;
        $ventes = Vente::where('date_vente', 'LIKE', "%$this->searchRapport%")->where('deleted','=',0)->get();
        foreach($ventes as $vente){
            if ($vente->validate == 1) {
                $montant_vente_valide = $montant_vente_valide + $vente->prix_vente * $vente->qte_vente;
            }else{
                $montant_vente_invalide = $montant_vente_invalide + $vente->prix_vente * $vente->qte_vente;
            }
        }

        $dettes = Dette::where('date_dette', 'LIKE', "%$this->searchRapport%")->where('deleted','=',0)->get();

        $montant_dette_valide = 0;
        $montant_dette_invalide = 0;

        foreach($dettes as $dette){

            if ($dette->payed == 1) {
                $montant_dette_valide = $montant_dette_valide + $dette->prix_vente * $dette->qte_dette;
            }else{
                $montant_dette_invalide = $montant_dette_invalide + $dette->prix_vente * $dette->qte_dette;
            }
        }

        $depense = Depenses::where('date_depense', 'LIKE', "%$this->searchRapport%")->where('deleted','=',0)->get();
        $montant_depenses = $depense->sum('montant');



        $achats = Achat::where('date_achat', 'LIKE', "%$this->searchRapport%")->where('deleted','=',0)->get();
        $montant_achat = $achats->sum('prix_achat');

        $dettes = Dette::OrderBy('date_dette','desc')->where('date_dette', 'LIKE', "%$this->search%")->where('deleted','=',0)->paginate($this->nbpage);


        $this->montant_vente_valides = $montant_vente_valide;
        $this->montant_vente_invalides = $montant_vente_invalide;
        $this->montant_dette_valides = $montant_dette_valide;
        $this->montant_dette_invalides = $montant_dette_invalide;
        $this->montant_achats = $montant_achat;
        $this->montant_depensess = $montant_depenses;

        $this->reste_valides = $this->montant_vente_valides + $this->montant_dette_valides - $this->montant_achats - $this->montant_depensess;
        $this->reste_invalides = $this->montant_vente_invalides + $this->montant_dette_invalides;

        $is_report = Rapport::where("date_rapport", "LIKE", "%$this->searchRapport%")->first();


        return view('livewire.raport-data-table',[
            'montant_vente_valide' => $montant_vente_valide,
            'montant_vente_invalide' => $montant_vente_invalide,
            'montant_dette_valide' => $montant_dette_valide,
            'montant_dette_invalide' => $montant_dette_invalide,
            'montant_achat' => $montant_achat,
            'montant_depenses' => $montant_depenses,
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
            'vente_jour' => $this->montant_vente_valides,
            'vente_non_payer' => $this->montant_vente_invalides,
            'depense_jour' => $this->montant_depensess,
            'achat_jour' => $this->montant_achats,
            'dette_jour' => $this->montant_dette_valides,
            'dette_non_payer' => $this->montant_dette_invalides,
            'user_id' => Auth::user()->id,
            'date_rapport' => $this->searchRapport
        ]);

        Caisse::create([
            'rapport_id' => $rapport->id,
            'date_rapport' => $rapport->date_rapport,
            'argent_entree' => $this->montant_vente_valides + $this->montant_dette_valides - $this->montant_achats - $this->montant_depensess
        ]);

        session()->flash('message','mise a jour rapport effectue avec success');
    }

    public function updatereport($idReport){

        $rapport = Rapport::findOrFail($idReport);

        $rapport->update([
            'vente_jour' => $this->montant_vente_valides,
            'vente_non_payer' => $this->montant_vente_invalides,
            'depense_jour' => $this->montant_depensess,
            'achat_jour' => $this->montant_achats,
            'dette_jour' => $this->montant_dette_valides,
            'dette_non_payer' => $this->montant_dette_invalides,
            'user_id' => Auth::user()->id,
            'date_rapport' => $this->searchRapport
        ]);

        $caisse = Caisse::where('rapport_id','=',$rapport->id)->first();

        if($caisse){
            $caisse->update([
                'rapport_id' => $rapport->id,
                'date_rapport' => $rapport->date_rapport,
                'argent_entree' => $this->montant_vente_valides + $this->montant_dette_valides - $this->montant_achats - $this->montant_depensess
            ]);
        }else{
            Caisse::create([
                'rapport_id' => $rapport->id,
                'date_rapport' => $rapport->date_rapport,
                'argent_entree' => $this->montant_vente_valides + $this->montant_dette_valides - $this->montant_achats - $this->montant_depensess
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
