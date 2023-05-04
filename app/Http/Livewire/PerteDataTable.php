<?php

namespace App\Http\Livewire;

use App\Models\Perte;
use App\Models\Produit;
use Livewire\Component;
use Livewire\WithPagination;

class PerteDataTable extends Component
{
    public $search;
    public $nb = 5;
    use WithPagination;
    public function render()
    {
        return view('livewire.perte-data-table',[
            'produits' => Produit::where('deleted','=',0)->get(),
            'pertes' => Perte::where('deleted','=',0)->paginate($this->nb),
        ]);
    }
}
