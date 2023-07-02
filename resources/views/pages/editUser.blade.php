@extends('layouts.app')
@section('main')
<div class="grid w-10/12 mx-auto bg-white shadow-lg rounded-2xl md:w-3/5 md:grid-cols-2 h-3/4">
    <div class="hidden w-full p-10 md:block h-96">
        <img class="object-cover w-full h-full rounded rounded-bl-2xl" src="{{ Storage::url($user->file) }}" alt="" srcset="">
    </div>
    <div class="flex flex-col justify-around p-5">
        <div class="flex items-center justify-start ">
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
                <input name='nom'  placeholder='enter le nom' class="w-full h-10 p-1 pl-2 border rounded" value='{{ $user->name }}'  type="text">
            </div>
            <div class='ml-3 text-red-600'>
                @error('nom')
                    {{ $message }}
                @enderror
            </div>
            <div class="w-full m-3">
                <input name='prenom' value='{{ $user->lastname }}' placeholder='enter le prenom' class="w-full h-10 p-1 pl-2 border rounded"  type="text">
            </div>
            <div class='ml-3 text-red-600'>
                @error('prenom')
                    {{ $message }}
                @enderror
            </div>
            <div class="w-full m-3">
                <input name='mail' value='{{ $user->email }}' placeholder='enter le mail' class="w-full h-10 p-1 pl-2 border rounded" type="email">
            </div>
            <div class='ml-3 text-red-600'>
                @error('mail')
                    {{ $message }}
                @enderror
            </div>
            <div class="w-full m-3">
                <select name='fonction' fonction='fonction' value='{{ $user->is_admin }}' class="w-full h-10 p-1 pl-2 border rounded">

                    {{-- <option value="serveur">Serveur</option> --}}
                    <option value="admin">admin</option>
                    <option value="comptoire">Comptoire</option>
                </select>
            </div>
            <div class='ml-3 text-red-600'>
                @error('fonction')
                    {{ $message }}
                @enderror
            </div>
            <div class="w-full m-3">
                <input name='password' value='{{ Hash::check('plain-text', $user->password) }}' placeholder='enter le password' class="w-full h-10 p-1 pl-2 border rounded"  type="password">
            </div>
            <div class='ml-3 text-red-600'>
                @error('password')
                    {{ $message }}
                @enderror
            </div>
            <div class="w-full m-3">
                <input name='password_confirmation' value='{{ Hash::check('plain-text', $user->password) }}' placeholder='confirm votre password' class="w-full h-10 p-1 pl-2 border rounded" type="password">
            </div>
            <div class='ml-3 text-red-600'>
                @error('confirm')
                    {{ $message }}
                @enderror
            </div>
            <div class="w-full m-3">
                <input type='file' class="w-full h-10 p-1 pl-2 border rounded" value='{{ $user->file }}' name='file'>
            </div>
            <div class='ml-3 text-red-600'>
                @error('file')
                    {{ $message }}
                @enderror
            </div>
            <div class="w-full m-3">
                <button type='submit' class="w-full h-10 p-1 font-bold text-white bg-blue-500 rounded">Modifier</button>
            </div>
        </form>
    </div>
</div>
@endsection
