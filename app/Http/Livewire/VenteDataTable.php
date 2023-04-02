<?php

namespace App\Http\Livewire;

use App\Models\Vente;
use Livewire\Component;

class VenteDataTable extends Component
{
    public function render()
    {
        return view('livewire.vente-data-table',[
            'ventes' => Vente::all()
        ]);
    }
}
