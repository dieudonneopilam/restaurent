@extends('layouts.app')
@section('main')
<div class="bg-white rounded-2xl w-10/12 md:w-3/5 md:grid-cols-2 mx-auto grid h-3/4 shadow-lg">
    <div class=" hidden  h-96 w-full  relative md:flex items-center justify-center">
        <img class="w-full h-full object-fill rounded-tl-2xl rounded-2xl" src="{{ Storage::url($produit->file) }}" alt="" srcset="">
    </div>
    <div class="flex flex-col p-5 justify-around">
        <div class="flex justify-start items-center ">
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
                <input name='designation' value="{{ $produit->designation }}" class="p-1 w-full border rounded h-10 pl-2" placeholder="nom produit" type="text">
            </div>
            <div class="w-full m-3">
                <input name='file' class="w-full p-1 border rounded h-10 pl-2" type="file">
            </div>
            <div class="w-full m-3">
                <button class="w-full rounded bg-blue-500 p-1 h-10 text-white font-bold" type="submit">Enregistrer</button>
            </div>
        </form>
    </div>
</div>
@endsection