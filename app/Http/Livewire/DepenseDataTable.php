<?php

namespace App\Http\Livewire;

use App\Models\Depenses;
use Livewire\Component;
use App\Models\Dette;
use App\Models\Produit;
use App\Models\User;
use App\Models\Vente;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class DepenseDataTable extends Component
{
    use WithPagination;

    public $motif;
    public $achat;
    public $montant;
    public $produit_id;
    public $server_id;
    public $qte;
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

    public function mount(){
        $this->search = date(now());
        $this->search = date('Y-m-d');
    }

    public function render()
    {
        if (Auth::user()->is_comptoire or Auth::user()->is_admin or Auth::user()->is_visit) {
            $depenses = Depenses::OrderBy('date_depense','desc')->where('deleted','=',0)->where('date_depense', 'LIKE', "%$this->search%")->paginate($this->nbpage);

            $depenses_sum = Depenses::where('date_depense', 'LIKE', "%$this->search%")->where('deleted','=',0)->get();

            $montant_valide = 0;
            foreach($depenses_sum as $depense_sum){
                $montant_valide = $montant_valide + $depense_sum->montant;
            }

        }

        return view('livewire.depense-data-table',[
            'depenses' => $depenses,
            'produits' => Produit::all(),
            'montant_valide' => $montant_valide,
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

            'montant' => ['required', 'numeric'],
            'motif' => ['required'],
        ];

        if ($this->achat) {
            $this->rules['produit_id'] = ['required', 'numeric'];
            $this->rules['qte'] = ['required', 'numeric'];
        }

        $this->validate();

        if ($this->achat) {

            Depenses::create([
                'motif' => $this->motif,
                'montant' => $this->montant,
                'date_depense' => now(),
                'produit_id' => $this->produit_id,
                'qte_achat' => $this->qte,
                'user_id' => Auth::user()->id
            ]);

            $produit = Produit::findOrfail($this->produit_id);
            $produit->update([
                'qte' => $produit->qte + $this->qte
            ]);
        }else{
            Depenses::create([
                'motif' => $this->motif,
                'montant' => $this->montant,
                'date_depense' => now(),
                'user_id' => Auth::user()->id
            ]);
        }

        session()->flash('message','depense enregistrer avec success');

        $this->opentable = true;
        $this->open = false;

        $this->motif = '';
        $this->montant = '';

    }
    public function forget(){
        session()->forget('message');
    }
    public function deleteVenteUnValide($id){
        $depense = Depenses::findOrFail($id);

        $depense->update([
            'deleted' => 1,
            'date_deleted' => now()
        ]);

        if ($depense->produit_id) {
            $produit = Produit::findOrFail($depense->produit->id);

            $produit->update([
                'qte' => $produit->qte - $depense->qte_achat,
            ]);
        }
    }
}
