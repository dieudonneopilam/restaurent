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
            'file' => ['required'],
            'designation' => ['required'],
            'stock_alerte' => ['required','numeric'],
        ]);
        $filename = time().'.'.$request->file->extension();

        $path = $request->file->storeAs(
            'avatars',
            $filename,
            'public'
        );
        Produit::findOrFail($id)->update([
            'designation' => $request->designation,
            'file' => $path,
            'stock_alerte' => $request->stock_alerte
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
