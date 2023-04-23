<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('authentification.login');
    }
    public function auth(Request $request){
        $request->validate([
            'email' => ['required','email'],
            'password' => ['required']
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'deleted' => 0])) {
            return \redirect()->route('home');
        }
        return \redirect()->route('login',[
            'message' => 'les identifiants ne sont pas reconnus'
        ]);
    }
    public function logout(){
        Auth::logout();
        return \redirect()->route('home');
    }
    
}
