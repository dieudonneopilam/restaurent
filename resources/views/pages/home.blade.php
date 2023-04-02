@extends('layouts.app')
@section('main')
<div class="container flex flex-col w-11/12 p-5 mx-auto mt-5 rounded-md sm:w-4/5">
    <div>
        <h1 class="mb-10 text-3xl text-center">Menu General</h1>
    </div>
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 mb-8 gap-2 text-center ">
        <div class=" bg-white shadow-md border rounded-md pb-5">
            <img class="h-36 rounded" src="{{ asset('img/user.jpg') }}" alt="">
            <a class="text-blue-600" href="{{ route('user.index') }}">Agents</a>
        </div>
        <div class="bg-white border shadow-md rounded-md pb-5">
            <img class="h-36 rounded" src="{{ asset('img/vente.webp') }}" alt="">
             <a class="text-blue-600 " href="{{ route('produit.index') }}">Produit</a>
         </div>
        {{-- <div class="bg-white rounded-md pb-5 shadow-md border ">
            <img class="h-36 rounded" src="{{ asset('img/stock.webp') }}" alt="">
            <a class="text-blue-600 " href="">Stock</a>
        </div> --}}
        <div class="rounded-md pb-5 shadow-md border">
           <img class="h-36 rounded" src="{{ asset('img/achat.jpg') }}" alt="">
            <a class="text-blue-600 " href="">Achats</a>
        </div>
        <div class="bg-white border shadow-md rounded-md pb-5">
           <img class="h-36 rounded" src="{{ asset('img/vente.png') }}" alt="">
            <a class="text-blue-600 " href="{{ route('vente.index') }}">Ventes</a>
        </div>
        <div class=" bg-white shadow-md border rounded-md pb-5">
            <img class="h-36 rounded" src="{{ asset('img/dette.jpg') }}" alt="">
            <a class="text-blue-600 " href="">Dettes</a>
        </div>
        <div class=" bg-white shadow-md border rounded-md pb-5">
            <img class="h-36 rounded" src="{{ asset('img/rapport.jpg') }}" alt="">
            <a class="text-blue-600 " href="">Rapport</a>
        </div>
    </div>
</div>
@endsection
