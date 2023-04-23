@extends('layouts.app')
@section('main')
<div class="bg-white rounded-2xl w-10/12 md:w-3/5 md:grid-cols-2 mx-auto grid h-3/4 shadow-lg">
    <div class=" hidden md:block h-96 w-full p-10">
        <img class="w-full h-full object-fill rounded rounded-bl-2xl" src="{{ Storage::url($user->file) }}" alt="" srcset="">
    </div>
    <div class="flex flex-col p-5 justify-around">
        <div class="flex justify-start items-center ">
            <a class="mr-5 text-blue-400" href="{{ route('user.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-reply-fill" viewBox="0 0 16 16">
                    <path d="M5.921 11.9 1.353 8.62a.719.719 0 0 1 0-1.238L5.921 4.1A.716.716 0 0 1 7 4.719V6c1.5 0 6 0 7 8-2.5-4.5-7-4-7-4v1.281c0 .56-.606.898-1.079.62z"/>
                  </svg>
            </a>
            <span class="text-xl">Modifier User</span>
        </div>
        <form action='{{ route('user.update',$user->id) }}' method='POST' enctype="multipart/form-data"  class="flex flex-col items-start justify-between">
        @csrf
        @method('PUT')
            
            <div class="w-full m-3">
                <input name='nom'  placeholder='enter le nom' class="p-1 w-full border rounded h-10 pl-2" value='{{ $user->name }}'  type="text">
            </div>
            <div class='text-red-600 ml-3'>
                @error('nom')
                    {{ $message }}
                @enderror
            </div>
            <div class="w-full m-3">
                <input name='prenom' value='{{ $user->lastname }}' placeholder='enter le prenom' class="p-1 w-full border rounded h-10 pl-2"  type="text">
            </div>
            <div class='text-red-600 ml-3'>
                @error('prenom')
                    {{ $message }}
                @enderror
            </div>
            <div class="w-full m-3">
                <input name='mail' value='{{ $user->email }}' placeholder='enter le mail' class="p-1 w-full border rounded h-10 pl-2" type="email">
            </div>
            <div class='text-red-600 ml-3'>
                @error('mail')
                    {{ $message }}
                @enderror
            </div>
            <div class="w-full m-3">
                <select name='fonction' fonction='fonction' value='{{ $user->is_admin }}' class="w-full h-10 p-1 pl-2 border rounded">
                   
                    <option value="serveur">Serveur</option>
                    <option value="admin">admin</option>
                    <option value="comptoire">Comptoire</option>
                </select>
            </div>
            <div class='text-red-600 ml-3'>
                @error('fonction')
                    {{ $message }}
                @enderror
            </div>
            <div class="w-full m-3">
                <input name='password' value='{{ Hash::check('plain-text', $user->password) }}' placeholder='enter le password' class="p-1 w-full border rounded h-10 pl-2"  type="password">
            </div>
            <div class='text-red-600 ml-3'>
                @error('password')
                    {{ $message }}
                @enderror
            </div>
            <div class="w-full m-3">
                <input name='password_confirmation' value='{{ Hash::check('plain-text', $user->password) }}' placeholder='confirm votre password' class="p-1 w-full border rounded h-10 pl-2" type="password">
            </div>
            <div class='text-red-600 ml-3'>
                @error('confirm')
                    {{ $message }}
                @enderror
            </div>
            <div class="w-full m-3">
                <input type='file' class="w-full p-1 border rounded h-10 pl-2" value='{{ $user->file }}' name='file'>
            </div>
            <div class='text-red-600 ml-3'>
                @error('file')
                    {{ $message }}
                @enderror
            </div>
            <div class="w-full m-3">
                <button type='submit' class="w-full rounded bg-blue-500 p-1 h-10 text-white font-bold">Modifier</button>
            </div>
        </form>
    </div>
</div>
@endsection
