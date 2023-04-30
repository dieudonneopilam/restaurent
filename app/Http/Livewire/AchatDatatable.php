<?php

namespace App\Http\Livewire;

use App\Models\Achat;
use App\Models\Produit;
use Livewire\Component;

class AchatDatatable extends Component
{
    public $search = '';

    public function mount(){
        $this->search = date(now());
        $this->search = date('Y-m-d');
    }

    public function render()
    {
        $achats = Achat::where("date_achat", "LIKE", "%$this->search%")->get();
        return view('livewire.achat-datatable',[
            'achats' => $achats,
            'montant' => $achats->sum('prix_achat')
        ]);
    }
    public function delete($id){
        $achat = Achat::findOrFail($id);
        $achat->update([
            'deleted' => 1,
            'date_deleted' => now()
        ]);

        $produit = Produit::findOrFail($achat->produit_id);

        $produit->update([
            'qte' => $produit->qte - $achat->qte_achat
        ]);
    }
}
