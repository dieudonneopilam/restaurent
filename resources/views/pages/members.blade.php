@extends('layouts.app')
@section('main')
<div class="container flex flex-col w-11/12 p-5 mx-auto mt-5">
    <div class="flex items-center justify-between">
        <div class="flex justify-center items-center ">
            <a class="mr-5 text-blue-400" href="{{ route('home') }}">
                <svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 96 960 960" width="30"><path d="M220 876h150V626h220v250h150V486L480 291 220 486v390Zm-60 60V456l320-240 320 240v480H530V686H430v250H160Zm320-353Z"/></svg>
            </a>
            <h1 class="text-2xl">Membres</h1>
        </div>
        <a href="{{ route('user.create') }}" class=" text-blue-400 rounded-full p-1 px-3  border-blue-400 border-2">
            Add User
        </a>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 mt-5 gap-2">
        <div class="bg-white shadow-md rounded flex relative p-2 mt-3">
            <img class="h-12 w-12 rounded-full mr-5" src="{{ asset('img/rapport.jpg') }}" alt="">
            <div>
                <h1>Dieudonne Ngwangwa</h1>
                <p>fonction</p>
            </div>
            <span class="absolute top-0 right-0 block mr-5 mt-5 menu-user">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                    <path
                        d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                </svg>
            </span>
            <div class="hidden menu-edit w-2/5 absolute top-0 right-0  flex-col rounded  mr-10 mt-5 bg-white shadow-md">
                <a class="w-full block p-1 pl-3 hover:text-blue-500" href="{{ route('user.edit',1) }}">Modifier</a>
                <a class="w-full block p-1 pl-3 hover:text-red-500 hover:transition-colors" href="">Supprimer</a>
            </div>
        </div>
    </div>
</div>
@endsection
