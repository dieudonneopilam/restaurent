<?php

namespace App\Http\Livewire;

use App\Models\Perte;
use App\Models\Produit;
use Livewire\Component;
use Livewire\WithPagination;

class PerteDataTable extends Component
{
    use WithPagination;

    public $produit_id;
    public $search;
    public $date_perte;
    public $nb = 5;
    public $qte_perte;
    public $prix_vente;
    public $responsable;

    protected $rules = [
        'produit_id' => ['required'],
        'qte_perte' => ['required'],
        'prix_vente' => ['required'],
        'responsable' => ['required'],
        'date_perte' => ['required']
    ];

    public function render()
    {
        return view('livewire.perte-data-table',[
            'produits' => Produit::where('deleted','=',0)->get(),
            'pertes' => Perte::where('deleted','=',0)->paginate($this->nb),
        ]);
    }

    public function submit(){
        $this->validate();

        Perte::create([
            'produit_id' => $this->produit_id,
            'date_perte' => $this->date_perte,
            'prix_perdu' => $this->prix_vente,
            'qte_perdu' => $this->qte_perte,
            'person_perte' => $this->responsable
        ]);

        $produit = Produit::findOrFail($this->produit_id);

        $produit->update([
            'qte' => $produit->qte - $this->qte_perte,
        ]);

        session()->flash('message','Enregistrement effectue avec success');
    }

    public function deletePerte($id){
        $perte = Perte::findOrFail($id);
        $produit = Produit::findOrFail($perte->produit_id);

        $perte->update([
            'deleted' => 1,
            'date_deleted' => now()
        ]);

        $produit->update([
            'qte' => $produit->qte + $perte->qte_perdu
        ]);

        session()->flash('messageS','suppression effectuee avec success');
    }

    public function forget(){
        $this->produit_id = "";
        $this->date_perte = "";
        $this->prix_vente = "";
        $this->qte_perte = "";
        $this->responsable = "";
        session()->forget('message');
    }
}
