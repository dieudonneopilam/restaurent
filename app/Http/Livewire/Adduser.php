<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;

class Adduser extends Component
{
    use WithFileUploads;

    public $nom;
    public $prenom;
    public $password;
    public $password_confirmation;
    public $fonction;
    public $mail;
    public $file;

    protected $rules = [
        'nom' => ['required'],
        'prenom' => ['required'],
        'password' => ['required','confirmed'],
        'fonction' => ['required'],
        'mail' => ['required','email','unique:users,email'],
        'password_confirmation' => ['required'],
        'file' => ['required']
    ];
    public function render()
    {
        return view('livewire.adduser');
    }
    public function submit(){
        $this->validate();

        $filename = time().'.'.$this->file->extension();

        $path = $this->file->storeAs(
            'avatars',
            $filename,
            'public'
        );

        User::create([
            'name' => $this->nom,
            'lastname' => $this->prenom,
            'email' => $this->mail,
            'password' => Hash::make($this->password),
            'login' => $this->mail,
            'is_server' => $this->fonction == 'serveur' ?  1 : 0,
            'is_comptoire' => $this->fonction == 'comptoire' ?  1 : 0,
            'is_admin' => $this->fonction == 'admin' ?  1 : 0,
            'is_visit' => $this->fonction == 'visit' ?  1 : 0,
            'file' => $path
        ]);
        return \redirect()->route('user.index');
    }
}
