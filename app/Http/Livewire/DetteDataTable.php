<?php

namespace App\Http\Livewire;

use App\Models\Dette;
use Livewire\Component;
use App\Models\Produit;
use App\Models\User;
use App\Models\Vente;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class DetteDataTable extends Component
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
            $dettes = Dette::where('user_id','=',Auth::user()->id)->where('date_dette', 'LIKE', "%$this->search%")->where('deleted','=',0)->OrderBy('date_dette','desc')->paginate($this->nbpage);
            
            $dettes_sum = Dette::where('date_dette', 'LIKE', "%$this->search%")->where('deleted','=',0)->where('user_id','=',Auth::user()->id)->get();
            $montant_valide = 0;
            $montant_invalide = 0; 
            foreach($dettes_sum as $dette_sum){

                if ($dette_sum->payed == 1) {
                    $montant_valide = $montant_valide + $dette_sum->prix_vente * $dette_sum->qte_dette;
                }else{
                    $montant_invalide = $montant_invalide + $dette_sum->prix_vente * $dette_sum->qte_dette;
                }
            }
        }elseif (Auth::user()->is_comptoire or Auth::user()->is_admin) {
            $dettes = Dette::OrderBy('date_dette','desc')->where('date_dette', 'LIKE', "%$this->search%")->where('deleted','=',0)->paginate($this->nbpage);

            $dettes_sum = Dette::where('date_dette', 'LIKE', "%$this->search%")->where('deleted','=',0)->get();
            $montant_valide = 0;
            $montant_invalide = 0; 
            foreach($dettes_sum as $dette_sum){

                if ($dette_sum->payed == 1) {
                    $montant_valide = $montant_valide + $dette_sum->prix_vente * $dette_sum->qte_dette;
                }else{
                    $montant_invalide = $montant_invalide + $dette_sum->prix_vente * $dette_sum->qte_dette;
                }
            }
        }

        return view('livewire.dette-data-table',[
            'dettes' => $dettes,
            'produits' => Produit::all(),
            'agents' => User::all(),
            'montant_valide' => $montant_valide,
            'montant_invalide' => $montant_invalide
        ]);
    }

    public function deleteVenteUnValide($id){
        $dette = Dette::findOrFail($id);
        $dette->update([
            'deleted' => 1,
            'date_deleted' => now()
        ]);
        $produit = Produit::findOrFail($dette->produit_id);
        $produit->update([
            'qte' => $produit->qte + $dette->qte_dette
        ]);
    }

    public function valider($id){

        $vente = Dette::findOrFail($id);

        $vente->update([
            'payed' => 1
        ]);
    }
}
