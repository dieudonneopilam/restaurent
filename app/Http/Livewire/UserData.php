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

    public function delete($id){
        $user = User::findOrFail($id)->update([
            'deleted' => 1,
            'date_deleted' => now()
        ]);
    }
}
