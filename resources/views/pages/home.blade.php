@extends('layouts.app')
@section('main')
<div class="container flex flex-col w-11/12 p-5 mx-auto mt-5 bg-white rounded-md sm:w-4/5">
    <div>
        <div class="mb-5 text-5xl font-extrabold text-center">
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-pink-500 to-violet-500">
                Gestion de Stock
            </span>
        </div>
    </div>
    <div class="grid grid-cols-2 gap-2 mb-8 text-center sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 ">
        @if (Auth::user()->is_admin or Auth::user()->is_visit)
        @if (Auth::user()->is_admin)
            <div class="pb-5 bg-white border rounded-md shadow-md hover:shadow-2xl ">
                <img class="rounded h-36" src="{{ asset('img/user.jpg') }}" alt="">
                <a class="text-blue-600" href="{{ route('user.index') }}">Agents</a>
            </div>
        @endif
         <div class="pb-5 bg-white border rounded-md shadow-md hover:shadow-2xl">
            <img class="rounded h-36" src="{{ asset('img/bottles.webp') }}" alt="">
             <a class="text-blue-600 " href="{{ route('produit.index') }}">Stock Caisses</a>
         </div>
        <div class="pb-5 border rounded-md shadow-md hover:shadow-2xl">
           <img class="object-cover w-full rounded h-36" src="{{ asset('img/achat.png') }}" alt="">
            <a class="text-blue-600 " href="{{ route('achat.index') }}">Entrees Caisse</a>
        </div>

        @endif
        <div class="pb-5 bg-white border rounded-md shadow-md hover:shadow-2xl">
           <img class="rounded h-36" src="{{ asset('img/vendre.webp') }}" alt="">
            <a class="text-blue-600 " href="{{ route('vente.index') }}">Ventes ou Sortie</a>
        </div>
        <div class="pb-5 bg-white border rounded-md shadow-md ">
            <img class="rounded h-36" src="{{ asset('img/dette.jpg') }}" alt="">
            <a class="text-blue-600 " href="{{ route('dette.index') }}">Dettes</a>
        </div>
        <div class="pb-5 border rounded-md shadow-md hover:shadow-2xl">
            <img class="rounded h-36" src="{{ asset('img/bg.jpg') }}" alt="">
             <a class="text-blue-600 " href="{{ route('depense.index') }}">Depenses</a>
        </div>
        @if (Auth::user()->is_admin or Auth::user()->is_visit)
            <div class="pb-5 bg-white border rounded-md shadow-md hover:shadow-2xl ">
                <img class="rounded h-36" src="{{ asset('img/rapport.jpg') }}" alt="">
                <a class="text-blue-600 " href="{{ route('rapport') }}">Rapport</a>
            </div>
            <div class="pb-5 bg-white border rounded-md shadow-md hover:shadow-2xl ">
                <img class="rounded h-36" src="{{ asset('img/caisse.jpg') }}" alt="">
                <a class="text-blue-600 " href="{{ route('caisse') }}">Ma Caisse</a>
            </div>
        @endif
        <div class="pb-5 border rounded-md shadow-md hover:shadow-2xl">
            <img class="rounded h-36" src="{{ asset('img/perte.jpg') }}" alt="">
             <a class="text-blue-600 " href="{{ route('perte') }}">pertes</a>
         </div>
        {{-- <div class="pb-5 bg-white border rounded-md shadow-md hover:shadow-2xl ">
            @if (Auth::user()->file)
            <img class="object-cover w-full rounded h-36 " src="{{ Storage::url(Auth::user()->file) }}" alt="">
            @else
            <img class="object-fill w-full rounded h-36 " src="{{ asset('img/logoa.png') }}" alt="">
            @endif
            <a class="text-blue-600 " href="{{ route('situation') }}">Mon Profile</a>
        </div> --}}
    </div>
</div>
@endsection
