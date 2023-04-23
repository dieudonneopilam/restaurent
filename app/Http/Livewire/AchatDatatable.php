<?php

namespace App\Http\Livewire;

use App\Models\Achat;
use App\Models\Produit;
use Livewire\Component;

class AchatDatatable extends Component
{
    public $search = '';
    public function render()
    {
        return view('livewire.achat-datatable',[
            'achats' => Achat::all()
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
