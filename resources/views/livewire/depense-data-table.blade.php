<div x-data="{ openadd: false, opentable: true }">
    @if (Auth::user()->is_admin or Auth::user()->is_comptoire)
    <div x-show="openadd" class="grid w-10/12 mx-auto bg-white shadow-lg rounded-2xl md:w-3/5 md:grid-cols-2 h-3/4">
        <div class="hidden w-full p-10 md:block h-96">
            <img class="object-fill w-full h-full rounded-tl-2xl rounded-bl-2xl" src="{{ asset('img/vendre.webp') }}" alt="" srcset="">
        </div>
        <div class="flex flex-col justify-around p-5">
            <form x-data="{ open: false, dette : false }" wire:submit.prevent='submit' class="flex flex-col items-start justify-between">
                <div class="flex justify-end w-full">
                    <a x-on:click="openadd=false,opentable=true" wire:click="forget" class="" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                        </svg>
                    </a>
                </div>
                <div class="w-full my-3">
                    <label for="">Motif depense </label>
                    <input class="w-full h-10 p-1 pl-2 border rounded" placeholder=" motif" wire:model.defer="motif" type="text">
                </div>
                <div class='text-red-600'>
                    @error('motif')
                    {{ $message }}
                    @enderror
                </div>
                <div class="w-full my-3">
                    <label for="">Montant Depenses</label>
                    <input wire:model.defer='montant' class="w-full h-10 p-1 pl-2 border rounded" type="number">
                </div>
                <div class='text-red-600'>
                    @error('montant')
                    {{ $message }}
                    @enderror
                </div>
                <div class="w-full mt-3">
                    <select wire:model="devise_depense" class="w-full h-10 p-1 pl-2 border rounded">
                        <option value="null">devise prix vente</option>
                        <option value="Fc">FC</option>
                        {{-- <option value="$">USD</option> --}}
                    </select>
                </div>
                <div class='ml text-red-600'>
                    @error('devise_depense')
                        {{ $message }}
                    @enderror
                </div>

                {{-- @if(!Auth::user()->is_server)
                <div class="flex items-center ">
                    <input wire:model.defer='achat' x-on:click="open =! open" id="me" class="w-5 h-5 p-1 pl-2 border rounded" type="checkbox">
                    <label class="ml-5" for="me">Achat Produit</label>
                </div>
                <div x-show="open" x-transition.duration.500ms class="w-full my-3">
                    <label for="">Selectionner le produit</label>
                    <select wire:model.defer='produit_id' class="w-full h-10 p-1 pl-2 border rounded">
                        <option value="null">Selectionner le produit</option>
                        @foreach ($produits as $produit)
                        <option value="{{ $produit->id }}">{{ $produit->designation }}</option>
                        @endforeach
                    </select>
                    <div class='text-red-600'>
                        @error('produit_id')
                        {{ $message }}
                        @enderror
                    </div>
                    <div class="w-full my-3">
                        <label for="">Qte de Bouteilles achetées</label>
                        <input wire:model.defer='qte' class="w-full h-10 p-1 pl-2 border rounded" type="number">
                    </div>
                    <div class='text-red-600'>
                        @error('qte')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                @endif --}}

                <div class="flex justify-center">
                    <button wire:loading type="button" class="text-blue-500" disabled>
                        Processing...
                    </button>
                </div>
                @if (session()->has('message'))
                <div x-data="{ openadd: false, opentable: true }" class="w-full p-5 bg-green-400 rounded">

                    <div class=" alert-success">
                        {{ session('message') }}
                    </div>

                </div>
                @endif
                <div class="w-full my-3">
                    <input type="submit" class="w-full h-10 p-1 font-bold text-white bg-blue-500 rounded" />
                </div>

            </form>
        </div>
    </div>
    @endif
    <div x-show="opentable" class="overflow-x-auto">
        <div class="flex items-center justify-center p-2 overflow-hidden font-sans bg-white min-w-screen">
            <div class="w-full m-5 lg:w-5/6">
                <div class="flex flex-wrap-reverse items-center justify-between mx-1">
                    <div class="w-full h-10 sm:w-2/3">
                        <input x-mask="9999-99-99" class="w-4/5 h-full px-5 border rounded sm:w-1/2" wire:model.debounce.1000ms="search" placeholder="AAAA/MM/JR">
                        <select wire:model='nbpage' class="w-1/6 h-full px-1 border rounded" name="" id="">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                    <span class="flex items-center text-lg">{{ $montant_valide_Fc.' Fc' }}
                        <div class="flex justify-center text-green-500 ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                                <path d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z" />
                            </svg>
                        </div>
                    </span>
                    <span class="flex items-center text-lg">{{ $montant_valide_Usd.' $' }}
                        <div class="flex justify-center text-green-500 ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                                <path d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z" />
                            </svg>
                        </div>
                    </span>
                    <a x-on:click="{ openadd=false }" href="{{ route('home') }}" x-on:click="openadd=true,opentable=false" class="flex items-center h-10 px-2 my-2 text-white border rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 96 960 960" width="30">
                            <path
                                d="M220 876h150V626h220v250h150V486L480 291 220 486v390Zm-60 60V456l320-240 320 240v480H530V686H430v250H160Zm320-353Z" />
                        </svg>
                    </a>
                    @if (Auth::user()->is_admin or Auth::user()->is_comptoire)
                        <a href="#" x-on:click="openadd=true,opentable=false" class="flex items-center h-10 px-2 my-2 text-white bg-blue-500 border rounded">Nouvelle
                        depense</a>
                    @endif
                </div>
                <div class="m-1 my-1 overflow-x-auto bg-white rounded shadow-md">
                    {{ $depenses->links() }}
                    <!-- <div class="flex justify-center">
                        <button wire:loading type="button" class="text-blue-500" disabled>
                            Processing...
                        </button>
                    </div> -->
                    <table class="w-full table-auto min-w-max">
                        <thead>
                            <tr class="text-sm leading-normal text-gray-600 uppercase bg-gray-200">
                                <th class="px-6 py-3 text-left">DATE</th>
                                <th class="px-6 py-3 text-left">MOTIF</th>
                                <th class="px-6 py-3 text-left">MONTANT</th>
                                <th class="px-6 py-3 text-left">COMPTOIRE</th>
                                <th class="px-6 py-3 text-left">ACTION</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm font-light text-gray-600">
                            @forelse ($depenses as $depense)
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="px-6 py-3 text-left whitespace-nowrap">
                                        <div class="flex items-center">
                                            <span class="font-medium">{{ $depense->date_depense }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-3 text-left whitespace-nowrap">
                                        <div class="flex items-center">
                                            @if ($depense->produit_id)
                                            <div class="mr-2">
                                                <img class='w-8 h-8 rounded-full' src="{{ Storage::url($depense->produit->file) }}" alt="{{ __('') }}">
                                            </div>
                                            <span class="block mx-1 text-lg font-semibold text-red-500">{{ $depense->qte_achat }}</span>
                                            @endif
                                            <span class="font-medium">{{ $depense->motif }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-3 text-left whitespace-nowrap">
                                        <div class="flex items-center">
                                            <span class="font-medium">{{ $depense->montant }} {{ $depense->devise_depense }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-3 text-left whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="mr-2">
                                                <div class="mr-2">
                                                    <img class='w-8 h-8 rounded-full' src="{{ Storage::url($depense->user->file) }}" alt="{{ __('') }}">
                                                </div>
                                            </div>
                                            <span class="font-medium">{{ $depense->user->name }}</span>
                                        </div>
                                    </td>
                                    <td class="inline-block px-6 py-3 text-left">
                                        <div class="flex justify-center item-center">
                                            @if ($depense->validate)
                                            <div class="flex justify-center px-2 py-1 mr-5 font-medium text-green-500 transform rounded-full w-14 hover:scale-110 ">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                                                    <path d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z" />
                                                </svg>
                                            </div>
                                            @else
                                            @if (Auth::user()->is_server)
                                            <div class="flex justify-center px-2 py-1 mr-5 font-medium text-red-500 transform rounded-full w-14 hover:scale-110 ">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation" viewBox="0 0 16 16">
                                                    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.553.553 0 0 1-1.1 0L7.1 4.995z" />
                                                </svg>
                                            </div>
                                            @endif
                                            @endif
                                            @if (Auth::user()->is_admin)
                                            <div class="w-5 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                <svg wire:click="deleteVenteUnValide({{ $depense->id }})" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </div>
                                            @endif

                                        </div>
                                    </td>
                                </tr>
                            @empty
                                    <div class="text-lg text-red-500 ">
                                        Aucune depense effectuée
                                    </div>
                            @endforelse

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
