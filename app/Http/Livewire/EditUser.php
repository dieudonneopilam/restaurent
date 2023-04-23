<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditUser extends Component
{
    use WithFileUploads;

   
    public $id_user;
    public $nom;
    public $prenom;
    public $password;
    public $confirm;
    public $fonction;
    public $mail;
    public $file;

    protected $rules = [
        'nom' => ['required'],
        'prenom' => ['required'],
        'password' => ['required'],
        'fonction' => ['required'],
        'mail' => ['required'],
        'confirm' => ['required'],
        'file' => ['required'],
        'id' => ['required']
    ];

    public function mount($id){
        $this->id_user = $id;
    }

    public function render()
    {
        
        return view('livewire.edit-user',[
            'user' => User::findOrFail($this->id_user)
        ]);
    }
    public function submit($id){
        $this->validate();
        
        $filename = time().'.'.$this->file->extension();

        $path = $this->file->storeAs(
            'avatars',
            $filename,
            'public'
        );

        User::findOrFail($id)->edit([
            'name' => $this->nom,
            'lastname' => $this->prenom,
            'email' => $this->mail,
            'password' => $this->password,
            'login' => $this->mail,
            'is_server' => $this->fonction = 'serveur' ?  1 : 0,
            'is_comptoire' => $this->fonction = 'comptoire' ?  1 : 0,
            'is_admin' => $this->fonction = 'admin' ?  1 : 0,
            'file' => $path
        ]);
        return \redirect()->route('user.index');
    }
}
