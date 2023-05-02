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
    // public $montant_depensess;
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

    public function mount(){
    }

    public function render(){
        return view('livewire.caisse-data-table',[
            'caisses' => Caisse::where('date_rapport','LIKE','%'.$this->search.'%')->orderBy('date_rapport','desc')->paginate($this->nbpage)
        ]);
    }
    public function onCaisseUpdated(){
        $this->reset('idEdit');
    }
    public function startEdit($id){
        $this->idEdit = $id;
    }
}
