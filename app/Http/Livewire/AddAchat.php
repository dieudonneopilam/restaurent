<?php

namespace App\Http\Livewire;

use App\Models\Achat;
use App\Models\Produit;
use Livewire\Component;

class AddAchat extends Component
{
    public $qte_achat;
    public $prix_achat;
    public $produit_id;

    protected $rules = [
        'qte_achat' => ['required'],
        // 'prix_achat' => ['required','numeric'],
        'produit_id' => ['required','numeric']
    ];

    public function render()
    {
        return view('livewire.add-achat',[
            'produits' => Produit::all()
        ]);
    }

    public function submit(){
        $this->validate();
        Achat::create([
            'produit_id' => $this->produit_id,
            'qte_achat' => $this->qte_achat,
            // 'prix_achat' => $this->prix_achat,
            'prix_achat' => 0,
            'date_achat' => now()
        ]);

        $produit = Produit::findOrFail($this->produit_id);

        $produit->update([
            'qte' => $produit->qte + $this->qte_achat
        ]);
        return \redirect()->route('achat.index');
    }
}
