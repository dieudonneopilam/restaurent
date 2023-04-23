<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Vente;
use App\Models\Produit;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddVente extends Component
{
    public $produit_id;
    public $server_id;
    public $qte_vendu;
    public $prix_vente;
    public $me;

    protected $rules = [
        'prix_vente' => ['required', 'numeric'],
        'produit_id' => ['required', 'numeric'],
        'qte_vendu' => ['required', 'numeric'],
    ];

    public function render()
    {
        return view('livewire.add-vente', [
            'produits' => Produit::all(),
            'agents' => User::all()
        ]);
    }
    public function submit()
    {
        if ($this->me) {
            $this->rules['server_id'] = ['required', 'numeric'];
        }
        $this->validate();

        if (Auth::user()->is_comptoire OR Auth::user()->is_admin) {
            if ($this->me) {
                Vente::create([
                    'produit_id' => $this->produit_id,
                    'qte_vente' => $this->qte_vendu,
                    'prix_vente' => $this->prix_vente,
                    'user_id' => $this->server_id,
                    'date_vente' => now(),
                    'validate' => 1
                ]);
            } else {
                Vente::create([
                    'produit_id' => $this->produit_id,
                    'qte_vente' => $this->qte_vendu,
                    'prix_vente' => $this->prix_vente,
                    'user_id' => Auth::user()->id,
                    'date_vente' => now(),
                    'validate' => 1
                ]);
            }
            $produit = Produit::findOrFail($this->produit_id);
            $produit->update([
                'qte' => $produit->qte - $this->qte_vendu
            ]);
        } else {
            Vente::create([
                'produit_id' => $this->produit_id,
                'qte_vente' => $this->qte_vendu,
                'prix_vente' => $this->prix_vente,
                'user_id' => Auth::user()->id,
                'date_vente' => now(),
            ]);
        }

        return redirect()->route('vente.index');
    }

    public function update()
    {
    }
}