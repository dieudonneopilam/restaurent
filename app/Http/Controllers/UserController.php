<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.members');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.addUser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('pages.editUser',[
            'user' => User::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {


        $request->validate([
            'nom' => ['required'],
            'prenom' => ['required'],
            'fonction' => ['required'],
            'mail' => ['required','email'],
        ]);

         if (!empty($request->file)) {
            $filename = time().'.'.$request->file->extension();

            $path = $request->file->storeAs(
                'avatars',
                $filename,
                'public'
            );
         }
         if (!empty($request->password) or !empty($request->password_confirmation)) {
            $request->validate([
                'password' => ['required','confirmed'],
                'password_confirmation' => ['required'],
            ]);
         }
         $user = User::findOrFail($id);
        $user->update([
            'name' => $request->nom,
            'lastname' => $request->prenom,
            'email' => $request->mail,
            'password' => Hash::make($request->password),
            'login' => $request->mail,
            'is_server' => $request->fonction == 'serveur' ?  1 : 0,
            'is_comptoire' => $request->fonction == 'comptoire' ?  1 : 0,
            'is_admin' => $request->fonction == 'admin' ?  1 : 0,
            'file' => $path ?? $user->file
        ]);
        return \redirect()->route('user.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }
}
