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
    public $search = '';
    public $date_perte;

    public $nb = 5;

    public $qte_perte;
    public $prix_vente;
    public $responsable;
    public $label_prix;
    public $qte_stock;
    public $file;

    protected $rules = [
        'produit_id' => ['required'],
        'qte_perte' => ['required'],
        'prix_vente' => ['required'],
        'responsable' => ['required'],
        'date_perte' => ['required']
    ];
    public function mount(){
        $this->search = date(now());
        $this->search = date('Y-m-d');
    }

    public function render()
    {
        $pertes = Perte::where('deleted','=',0)->where('devise_prix','=','Fc')->get();
        $total_Fc = 0;

        foreach($pertes as $perte){
            $total_Fc = $total_Fc + $perte->prix_perdu * $perte->qte_perdu;
        }

        $pertes = Perte::where('deleted','=',0)->where('devise_prix','=','$')->get();
        $total_Usd = 0;

        foreach($pertes as $perte){
            $total_Usd = $total_Usd + $perte->prix_perdu * $perte->qte_perdu;
        }

        return view('livewire.perte-data-table',[
            'produits' => Produit::where('deleted','=',0)->get(),
            'pertes' => Perte::where('date_perte', 'LIKE', "%$this->search%")->where('deleted','=',0)->paginate($this->nb),
            'total_Fc' => $total_Fc,
            'total_Usd' => $total_Usd
        ]);
    }

    public function submit(){
        if ($this->qte_stock < $this->qte_perte) {
            session()->flash('error_qte','Error :  vous avez entrer une quantite superieur par rapport à la quantité disponible');
        }else{
            $this->validate();

        Perte::create([
            'produit_id' => $this->produit_id,
            'date_perte' => $this->date_perte,
            'prix_perdu' => $this->prix_vente,
            'qte_perdu' => $this->qte_perte,
            'devise_prix' => $this->devise_prix,
            'person_perte' => $this->responsable
        ]);

        $produit = Produit::findOrFail($this->produit_id);

        $produit->update([
            'qte' => $produit->qte - $this->qte_perte,
        ]);

        session()->flash('message','Enregistrement effectue avec success');
        }

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
}
