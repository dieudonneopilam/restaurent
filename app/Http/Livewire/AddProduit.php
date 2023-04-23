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

    protected $rules = [
        'file' => ['required'],
        'designation' => ['required'],
        'qte_initial' => ['required', 'numeric'],
        'stock_alerte' => ['required']
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
            'qte' => $this->qte_initial,
            'file' => $path,
            'stock_alerte' => $this->stock_alerte
        ]);

        return \redirect()->route('produit.index');

    }
}
