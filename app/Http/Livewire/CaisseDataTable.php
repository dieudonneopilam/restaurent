<?php

namespace App\Http\Livewire;

use App\Models\Achat;
use App\Models\Caisse;
use App\Models\Depenses;
use App\Models\Dette;
use Livewire\Component;
use App\Models\Produit;
use App\Models\Rapport;
use App\Models\Vente;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class CaisseDataTable extends Component
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

    public $searchRapport;
    public $search = '';
    public $nbpage = 5;
    public $idEdit = 0;

    public $rules = [
        'search' => ['required'],
        'nbpage' => ['required'],
    ];

    protected $listeners = [
        'CaisseUpdate' => 'onCaisseUpdated'
    ];

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

        $is_report = Rapport::where("date_rapport", "LIKE", "%$this->searchRapport%")->get();

        return view('livewire.caisse-data-table',[
            'caisses' => Caisse::paginate()
        ]);
    }


    public function onCaisseUpdated(){
        $this->reset('idEdit');
    }
    public function startEdit($id){
        $this->idEdit = $id;
    }
}
