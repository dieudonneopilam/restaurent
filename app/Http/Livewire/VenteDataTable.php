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
    public $devise_prix;
    public $qte_vendu;
    public $prix_vente;
    public $qte_stock;
    public $me;
    public $lable_prix;
    public $search = '';
    public $nbpage = 5;
    public $open = true;
    public $opentable = false;
    public $file;

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
        if (Auth::user()->is_server) {
            $ventes = Vente::where('user_id','=',Auth::user()->id)->where('date_vente', 'LIKE', "%$this->search%")->where('deleted','=',0)->OrderBy('date_vente','desc')->paginate($this->nbpage);

            $ventes_sum = Vente::where('date_vente', 'LIKE', "%$this->search%")->where('deleted','=',0)->where('devise_prix','=','Fc')->where('user_id','=',Auth::user()->id)->get();
            $montant_valide_Fc = 0;
            $montant_invalide = 0;
            foreach($ventes_sum as $vente_sum){
                if ($vente_sum->validate == 1) {
                    $montant_valide_Fc = $montant_valide_Fc + $vente_sum->prix_vente * $vente_sum->qte_vente;
                }else{
                    $montant_invalide = $montant_invalide + $vente_sum->prix_vente * $vente_sum->qte_vente;
                }
            }
            $ventes_sum = Vente::where('date_vente', 'LIKE', "%$this->search%")->where('deleted','=',0)->where('devise_prix','=','Fc')->where('user_id','=',Auth::user()->id)->get();
            $montant_valide_Usd = 0;
            $montant_invalide = 0;
            foreach($ventes_sum as $vente_sum){
                if ($vente_sum->validate == 1) {
                    $montant_valide_Usd = $montant_valide_Usd + $vente_sum->prix_vente * $vente_sum->qte_vente;
                }else{
                    $montant_invalide = $montant_invalide + $vente_sum->prix_vente * $vente_sum->qte_vente;
                }
            }
        }elseif (Auth::user()->is_comptoire or Auth::user()->is_admin or Auth::user()->is_visit) {
            $ventes = Vente::OrderBy('date_vente','desc')->where('deleted','=',0)->where('date_vente', 'LIKE', "%$this->search%")->paginate($this->nbpage);

            $ventes_sum = Vente::where('date_vente', 'LIKE', "%$this->search%")->where('deleted','=',0)->where('devise_prix','=','Fc')->get();
            $montant_valide_Fc = 0;
            $montant_invalide = 0;
            foreach($ventes_sum as $vente_sum){

                if ($vente_sum->validate == 1) {
                    $montant_valide_Fc = $montant_valide_Fc + $vente_sum->prix_vente * $vente_sum->qte_vente;
                }else{
                    $montant_invalide = $montant_invalide + $vente_sum->prix_vente * $vente_sum->qte_vente;
                }
            }
            $ventes_sum = Vente::where('date_vente', 'LIKE', "%$this->search%")->where('deleted','=',0)->where('devise_prix','=','$')->get();
            $montant_valide_Usd = 0;
            $montant_invalide = 0;
            foreach($ventes_sum as $vente_sum){

                if ($vente_sum->validate == 1) {
                    $montant_valide_Usd = $montant_valide_Usd + $vente_sum->prix_vente * $vente_sum->qte_vente;
                }else{
                    $montant_invalide = $montant_invalide + $vente_sum->prix_vente * $vente_sum->qte_vente;
                }
            }
        }

        return view('livewire.vente-data-table',[
            'ventes' => $ventes,
            'produits' => Produit::where('deleted','=',0)->get(),
            'agents' => User::where('deleted','=',0)->where(function ($query) {
                $query->where('is_admin', '=', 1)
                      ->orWhere('is_server', '=', 1)
                      ->orWhere('is_comptoire', '=', 1);
            })->get(),
            'montant_valide_Fc' => $montant_valide_Fc,
            'montant_valide_Usd' => $montant_valide_Usd
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

        $qte_dispo = Produit::where('id','=',$this->produit_id)->firstOrFail();


        if ($qte_dispo->qte > $this->qte_vendu) {
            if (Auth::user()->is_comptoire OR Auth::user()->is_admin) {
                if ($this->me and !$this->me_dette) {
                    Vente::create([
                        'produit_id' => $this->produit_id,
                        'qte_vente' => $this->qte_vendu,
                        'prix_vente' => $this->prix_vente,
                        'user_id' => $this->server_id,
                        'devise_prix' => $this->devise_prix,
                        'date_vente' => now(),
                        'validate' => 1
                    ]);
                }else if (!$this->me and $this->me_dette) {
                    Dette::create([
                        'produit_id' => $this->produit_id,
                        'qte_dette' => $this->qte_vendu,
                        'prix_vente' => $this->prix_vente,
                        'devise_prix' => $this->devise_prix,
                        'user_id' => Auth::user()->id,
                        'date_dette' => now(),
                        'name_dette' => $this->name_dette,
                    ]);
                }else if ($this->me and $this->me_dette) {
                    Dette::create([
                        'produit_id' => $this->produit_id,
                        'qte_dette' => $this->qte_vendu,
                        'prix_vente' => $this->prix_vente,
                        'user_id' => $this->server_id,
                        'devise_prix' => $this->devise_prix,
                        'date_dette' => now(),
                        'name_dette' => $this->name_dette,
                    ]);
                }
                else {
                    Vente::create([
                        'produit_id' => $this->produit_id,
                        'qte_vente' => $this->qte_vendu,
                        'prix_vente' => $this->prix_vente,
                        'user_id' => Auth::user()->id,
                        'date_vente' => now(),
                        'devise_prix' => $this->devise_prix,
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
                        'devise_prix' => $this->devise_prix,
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
                        'devise_prix' => $this->devise_prix,
                    ]);
                }

            }

            session()->flash('message','vente enregistrer avec success');
            $this->prix_vente = "";
            $this->qte_vendu = "";

        }else{
            session()->flash('error_qte','vous avez entrer une quantite superieur');
        }

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

    public function deleteVenteValide($id){

        $vente = Vente::findOrFail($id);
        $produit = Produit::findOrFail($vente->produit_id);



        $vente->update([
            'deleted' => 1,
            'date_deleted' => now()
        ]);

        $produit->update([
            'qte' => $produit->qte + $vente->qte_vente
        ]);
    }
    public function updatingProduitId($value){
        if($value){
            $produit = Produit::where('id','=',$value)->first();
            $this->file = $produit;
            $this->prix_vente = $produit->prix_vente;
            $this->label_prix = $produit->prix_vente.' '.$produit->devise_prix;
            $this->qte_stock = $produit->qte;
            $this->devise_prix = $produit->devise_prix;
        }
    }
    public function updatingQteVendu($value){

    }
    
}
