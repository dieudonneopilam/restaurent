@extends('layouts.app')
@section('main')
<div class="bg-white rounded-2xl w-10/12 md:w-3/5 md:grid-cols-2 mx-auto grid h-3/4 shadow-lg">
    <div class=" hidden md:block h-96 w-full p-10">
        <img class="w-full h-full object-fill rounded-tl-2xl rounded-bl-2xl" src="{{ asset('img/vente1.jpg') }}" alt="" srcset="">
    </div>
    <div class="flex flex-col p-5 justify-around">
        <form class="flex flex-col items-center justify-between" action="" enctype="multipart/form-data">
            <div class="w-full m-3">
                <label for="">Selection le produit</label>
                <input class="p-1 w-full border rounded h-10 pl-2" placeholder="" type="text">
            </div>
            <div class="w-full m-3">
                <label for="">Quantite à vendre </label>
                <input class="p-1 w-full border rounded h-10 pl-2" placeholder="ex: 1" type="text">
            </div>
            <div class="w-full m-3">
                <label for="">Prix Unitaire</label>
                <input class="w-full p-1 border rounded h-10 pl-2" type="number">
            </div>
            <div class="w-full m-3">
                <button class="w-full rounded bg-blue-500 p-1 h-10 text-white font-bold" type="submit">Enregistrer</button>
            </div>
        </form>
    </div>
</div>
@endsection
