<?php

namespace App\Http\Livewire;

use App\Models\Produit;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddProduit extends Component
{
    use WithFileUploads;

    public $file;
    public $designation;
    public $qte_initial;
    public $stock_alerte;
    public $prix_vente;
    public $devise_vente;

    protected $rules = [
        'file' => ['required'],
        'designation' => ['required'],
        'qte_initial' => ['required', 'numeric'],
        'stock_alerte' => ['required'],
        'devise_vente' => ['required'],
        'prix_vente' => ['required','numeric']
    ];
    public function render()
    {
        return view('livewire.add-produit');
    }

    public function submit(){
        $this->validate();
        $filename = time().'.'.$this->file->extension();

        $path = $this->file->storeAs(
            'avatars',
            $filename,
            'public'
        );
        Produit::create([
            'designation' => $this->designation,
            'qte_init' => $this->qte_initial,
            'qte' => $this->qte_initial,
            'file' => $path,
            'prix_vente' => $this->prix_vente,
            'devise_prix' => $this->devise_vente,
            'stock_alerte' => $this->stock_alerte
        ]);

        return \redirect()->route('produit.index');

    }
}
