@extends('layouts.app')
@section('main')
<div class="grid w-10/12 mx-auto bg-white shadow-lg rounded-2xl md:w-3/5 md:grid-cols-2 h-3/4">
    <div class="relative items-center justify-center hidden w-full h-96 md:flex">
        <img class="object-fill w-full h-full rounded-tl-2xl rounded-2xl" src="{{ Storage::url($produit->file) }}" alt="" srcset="">
    </div>
    <div class="flex flex-col justify-around p-5">
        <div class="flex items-center justify-start ">
            <a class="mr-5 text-blue-400" href="{{ route('produit.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-reply-fill" viewBox="0 0 16 16">
                    <path d="M5.921 11.9 1.353 8.62a.719.719 0 0 1 0-1.238L5.921 4.1A.716.716 0 0 1 7 4.719V6c1.5 0 6 0 7 8-2.5-4.5-7-4-7-4v1.281c0 .56-.606.898-1.079.62z"/>
                  </svg>
            </a>
            <span class="text-xl">Modifier ce produit</span>
        </div>
        <form class="flex flex-col items-center justify-between" method='POST' action="{{ route('produit.update',$produit->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <div class="w-full m-3">
                <input name='designation' value="{{ $produit->designation }}" class="w-full h-10 p-1 pl-2 border rounded" placeholder="nom produit" type="text">
            </div>
            @error('designation')
            <div class='ml-3 text-red-600'>
                {{ $message }}
            </div>
            @enderror
            <div class="w-full mt-3">
                <label for="">Prix de vente</label>
                <input value="{{ $produit->prix_vente }}" class="w-full h-10 p-1 pl-2 border rounded" placeholder="Prix vente caisse" name='prix_vente' type="number">
            </div>
            <div class='ml-3 text-red-600'>
                @error('prix_vente')
                    {{ $message }}
                @enderror
            </div>
            <div class="w-full mt-3">
                <label for="">Devise Prix vente</label>
                <select name='devise_prix' value="{{ $produit->devise_prix }}" class="w-full h-10 p-1 pl-2 border rounded">
                    <option value=""></option>
                    <option value="Fc">FC</option>
                    {{-- <option value="$">USD</option> --}}
                </select>
            </div>
            <div class='ml-3 text-red-600'>
                @error('devise_prix')
                    {{ $message }}
                @enderror
            </div>
            <div class="w-full m-3">
                <label for="">Stock initial</label>
                <input name='qte_initial' value="{{ $produit->qte_init }}" class="w-full h-10 p-1 pl-2 border rounded" placeholder="stock alerte" type="number">
            </div>
            @error('qte_initial')
            <div class='ml-3 text-red-600'>
                {{ $message }}
            </div>
            @enderror
            <div class="w-full m-3">
                <label for="">Stock Alerte</label>
                <input name='stock_alerte' value="{{ $produit->stock_alerte }}" class="w-full h-10 p-1 pl-2 border rounded" placeholder="stock alerte" type="number">
            </div>

            <div class="w-full m-3">
                <input name='file' class="w-full h-10 p-1 pl-2 border rounded" type="file">
            </div>
            @error('stoc_alerte')
            <div class='ml-3 text-red-600'>
                {{ $message }}
            </div>
            @enderror
            <div class="w-full m-3">
                <button class="w-full h-10 p-1 font-bold text-white bg-blue-500 rounded" type="submit">Enregistrer</button>
            </div>
        </form>
    </div>
</div>
@endsection
