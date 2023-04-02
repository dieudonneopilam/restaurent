<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UserData extends Component
{
    public function render()
    {
        return view('livewire.user-data',[
            'users' => User::all()
        ]);
    }
}
