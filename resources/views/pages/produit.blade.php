@extends('layouts.app')
@section('main')
<div class="container flex flex-col w-11/12 p-5 mx-auto mt-5 bg-white shadow-xl rounded-3xl ">
    <div class="flex justify-center items-center ">
       <a class="text-blue-500 m-2" href="{{ route('home') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-reply-fill" viewBox="0 0 16 16">
            <path d="M5.921 11.9 1.353 8.62a.719.719 0 0 1 0-1.238L5.921 4.1A.716.716 0 0 1 7 4.719V6c1.5 0 6 0 7 8-2.5-4.5-7-4-7-4v1.281c0 .56-.606.898-1.079.62z"/>
          </svg>
       </a>
        <h1 class="mb-1 text-lg text-left">Tous Les Produits</h1>
    </div>
    <div class=" rounded-md p-1 items-end">
        <div class="text-right mb-2 mt-2">
            <a href="{{ route('produit.create') }}"
                class="pl-3 pr-3 pt-1 pb-2 rounded-full mr-auto border-2 bg-gray-200 text-black-500 max-w-max shadow-md">nouveau
                poduit</a>
        </div>
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full text-center text-sm font-light shadow-md">
                            <thead class="border-b font-medium dark:border-neutral-500">
                                <tr>
                                    <th scope="col" class="px-6 py-2">N°</th>
                                    <th scope="col" class="">photo</th>
                                    <th scope="col" class="px-6 py-2">name</th>
                                    <th scope="col" class="px-6 py-2">Stock dispo</th>
                                    <th scope="col" class="">action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b dark:border-neutral-500">
                                    <td class="whitespace-nowrap px-6 py-2 font-medium">1</td>
                                    <td class="whitespace-nowrap w-12 max-w-max"><img
                                            class="h-12 object-fill w-12 m-1 rounded"
                                            src="{{ asset('img/rapport.jpg') }}" alt=""></td>
                                    <td class="whitespace-nowrap px-6 py-2">PRIMUS</td>
                                    <td class="whitespace-nowrap px-6 py-2 font-medium">50</td>
                                    <td class="whitespace-nowrap flex justify-center items-center m-1 h-12">
                                        <a class="text-blue-500 m-1 text-lg p-2 bg-gray-200 rounded" href="{{ route('produit.edit', 1) }}"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="20" height="20" fill="currentColor" class="bi bi-pen-fill"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z" />
                                            </svg>
                                        </a>
                                        <a class="text-red-500 m-1 text-lg block p-2 bg-gray-200 rounded " href="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                              </svg>
                                    </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
