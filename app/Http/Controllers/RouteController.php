<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function index(){
        return view('pages.home');
    }

    public function vente(){
        return view('pages.ventes');
    }

    public function storePoduit(){
        return view('pages.addProduit');
    }
    public function stockage(){
        return view('pages.stock');
    }
    public function rapport(){
        return view('pages.rapport');
    }
}
