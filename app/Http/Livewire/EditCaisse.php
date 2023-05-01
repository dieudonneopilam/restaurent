<?php

namespace App\Http\Livewire;

use App\Models\Caisse;
use Livewire\Component;

use function PHPUnit\Framework\isEmpty;

class EditCaisse extends Component
{
    public Caisse $caisse;
    public int $reste;

    protected $rules = [
        'caisse.argent_entree' => ['required', 'numeric'],
        'caisse.argent_banque' => ['required', 'numeric'],
        'caisse.argent_chef' => ['required', 'numeric'],
        'caisse.depenser' => ['required', 'numeric'],
        'reste' => ['numeric']
    ];


    public function render()
    {
        $this->verife();
        return view('livewire.edit-caisse');
    }

    public function save(){
        $this->verife();
        $this->rules['reste'] = ['numeric','min:0'];
        $this->validate();
        $this->caisse->save();
        $this->emit('CaisseUpdate');
    }

    public function verife(){
        $this->caisse->argent_banque = isEmpty($this->caisse->argent_banque) ? $this->caisse->argent_banque : 0;
        $this->caisse->argent_chef = isEmpty($this->caisse->argent_chef) ? $this->caisse->argent_chef : 0;
        // $this->caisse->depenser = isEmpty($this->caisse->depenser) ? $this->caisse->depenser : 0;
        $this->reste = $this->caisse->argent_entree - $this->caisse->argent_banque - $this->caisse->argent_chef - $this->caisse->depenser;
    }
}
