@extends('layouts.app')
@section('main')
<div class="container flex flex-col w-11/12 p-5 mx-auto mt-5">
    <div class="flex items-center justify-between">
        <div class="flex items-center justify-center ">
            <a class="mr-5 text-blue-400" href="{{ route('home') }}">
                <svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 96 960 960" width="30"><path d="M220 876h150V626h220v250h150V486L480 291 220 486v390Zm-60 60V456l320-240 320 240v480H530V686H430v250H160Zm320-353Z"/></svg>
            </a>
            <h1 class="text-2xl">Utilisateurs</h1>
        </div>
        <a href="{{ route('user.create') }}" class="p-1 px-3 text-blue-400 border-2 border-blue-400 rounded-full ">
            Add User
        </a>
    </div>
        @livewire('user-data')
</div>
@endsection
