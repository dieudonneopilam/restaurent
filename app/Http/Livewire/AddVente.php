<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddVente extends Component
{
    public int $produit_id ;
    public int $qte ;
    public int $prix;
    protected $rules = [
        'prix' => ['required'],
        'qte' => 'required',
        'produit_id' => ['required']
    ];

    public function render()
    {
        return view('livewire.add-vente');
    }
    public function submit(){
        $this->validate();
        dd($this->prix);
    }
    public function update(){

    }
}
