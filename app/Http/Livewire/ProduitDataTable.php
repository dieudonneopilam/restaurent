<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Produit;

class ProduitDataTable extends Component
{
    public $search = '';
    public function render()
    {
        return view('livewire.produit-data-table',[
            'produits' => Produit::all()
        ]);
    }

    public function delete($id){
        $user = Produit::findOrFail($id)->update([
            'deleted' => 1,
            'date_deleted' => now()
        ]);
    }
}
