<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.produit');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.addProduit');
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
        return view('pages.editProduit',[
            'produit' => Produit::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'designation' => ['required'],
            'stock_alerte' => ['required','numeric'],
            'qte_initial' => ['required','numeric'],
            'prix_vente' => ['required','numeric'],
            'devise_prix' => ['required']
        ]);

        if (!empty($request->file)) {
            $filename = time().'.'.$request->file->extension();

        $path = $request->file->storeAs(
            'avatars',
            $filename,
            'public'
        );
        }

       $produit =  Produit::findOrFail($id);
       $produit->update([
            'designation' => $request->designation,
            'file' => $path ?? $produit->file,
            'stock_alerte' => $request->stock_alerte,
            'qte_init' => $request->qte_initial,
            'qte' => $produit->qte - $produit->qte_init + $request->qte_initial,
            'prix_vente' => $request->prix_vente,
            'devise_prix' => $request->devise_prix
        ]);

        return \redirect()->route('produit.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
