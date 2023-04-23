<?php

namespace App\Http\Livewire;

use App\Models\Dette;
use App\Models\Produit;
use App\Models\User;
use App\Models\Vente;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class VenteDataTable extends Component
{
    use WithPagination;

    public $name_dette;
    public $me_dette;
    public $produit_id;
    public $server_id;
    public $qte_vendu;
    public $prix_vente;
    public $me;
    public $search = '';
    public $nbpage = 5;
    public $open = true;
    public $opentable = false;

    public $rules = [
        'search' => ['required'],
        'nbpage' => ['required'],
    ];
    public function render()
    {
        if (Auth::user()->is_server) {
            $ventes = Vente::where('user_id','=',Auth::user()->id)->where('date_vente', 'LIKE', "%$this->search%")->where('deleted','=',0)->OrderBy('date_vente','desc')->paginate($this->nbpage);
            
            $ventes_sum = Vente::where('date_vente', 'LIKE', "%$this->search%")->where('deleted','=',0)->where('user_id','=',Auth::user()->id)->get();
            $montant_valide = 0;
            $montant_invalide = 0; 
            foreach($ventes_sum as $vente_sum){

                if ($vente_sum->validate == 1) {
                    $montant_valide = $montant_valide + $vente_sum->prix_vente * $vente_sum->qte_vente;
                }else{
                    $montant_invalide = $montant_invalide + $vente_sum->prix_vente * $vente_sum->qte_vente;
                }
            }
        }elseif (Auth::user()->is_comptoire or Auth::user()->is_admin) {
            $ventes = Vente::OrderBy('date_vente','desc')->where('deleted','=',0)->where('date_vente', 'LIKE', "%$this->search%")->paginate($this->nbpage);

            $ventes_sum = Vente::where('date_vente', 'LIKE', "%$this->search%")->where('deleted','=',0)->get();
            $montant_valide = 0;
            $montant_invalide = 0; 
            foreach($ventes_sum as $vente_sum){

                if ($vente_sum->validate == 1) {
                    $montant_valide = $montant_valide + $vente_sum->prix_vente * $vente_sum->qte_vente;
                }else{
                    $montant_invalide = $montant_invalide + $vente_sum->prix_vente * $vente_sum->qte_vente;
                }
            }
        }

        
        
        return view('livewire.vente-data-table',[
            'ventes' => $ventes,
            'produits' => Produit::all(),
            'agents' => User::all(),
            'montant_valide' => $montant_valide,
            'montant_invalide' => $montant_invalide
        ]);
    }

    public function valider($id){

        $vente = Vente::findOrFail($id);

        $vente->update([
            'validate' => 1
        ]);
        $produit = Produit::findOrFail($vente->produit_id);
        $produit->update([
            'qte' => $produit->qte - $vente->qte_vente
        ]);
    }
    public function submit()
    {
         $this->rules = [
            'prix_vente' => ['required', 'numeric'],
            'produit_id' => ['required', 'numeric'],
            'qte_vendu' => ['required', 'numeric'],
        ];

        if ($this->me) {
            $this->rules['server_id'] = ['required', 'numeric'];
        }
        if ($this->me_dette) {
            $this->rules['name_dette'] = ['required'];
        }
        $this->validate();
        if (Auth::user()->is_comptoire OR Auth::user()->is_admin) {
            if ($this->me and !$this->me_dette) {
                Vente::create([
                    'produit_id' => $this->produit_id,
                    'qte_vente' => $this->qte_vendu,
                    'prix_vente' => $this->prix_vente,
                    'user_id' => $this->server_id,
                    'date_vente' => now(),
                    'validate' => 1
                ]);
            }else if (!$this->me and $this->me_dette) {
                Dette::create([
                    'produit_id' => $this->produit_id,
                    'qte_dette' => $this->qte_vendu,
                    'prix_vente' => $this->prix_vente,
                    'user_id' => Auth::user()->id,
                    'date_dette' => now(),
                    'name_dette' => $this->name_dette,
                ]);
            }else {
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

        } elseif(Auth::user()->is_server) {
            if ($this->me_dette) {
                Dette::create([
                    'produit_id' => $this->produit_id,
                    'qte_dette' => $this->qte_vendu,
                    'prix_vente' => $this->prix_vente,
                    'user_id' => Auth::user()->id,
                    'date_dette' => now(),
                    'name_dette' => $this->name_dette,
                ]);
                $produit = Produit::findOrFail($this->produit_id);
                $produit->update([
                    'qte' => $produit->qte - $this->qte_vendu
                ]);
            }else{
                Vente::create([
                    'produit_id' => $this->produit_id,
                    'qte_vente' => $this->qte_vendu,
                    'prix_vente' => $this->prix_vente,
                    'user_id' => Auth::user()->id,
                    'date_vente' => now(),
                ]);
            }
            
        }

        session()->flash('message','vente enregistrer avec success');
        
        $this->opentable = true;
        $this->open = false;
        if ($this->me_dette) {
            return redirect()->route('dette.index');
        }
    }
    public function forget(){
        session()->forget('message');
    }
    public function deleteVenteUnValide($id){
        Vente::findOrFail($id)->delete();
    }
}
