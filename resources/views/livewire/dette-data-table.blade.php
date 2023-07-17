<div class="overflow-x-auto">
    <div class="flex items-center justify-center p-2 overflow-hidden font-sans bg-white min-w-screen">
        <div class="w-full m-5 lg:w-5/6">
            <div class="flex flex-wrap-reverse items-center justify-between mx-1">
                <div class="w-full h-10 sm:w-2/3">
                    <input class="w-4/5 h-full px-5 border rounded sm:w-1/2" wire:model.debounce.500ms="search"  x-mask="1111-11-11" placeholder="AAAA/MM/JR">
                    <select wire:model='nbpage' class="w-1/6 h-full px-1 border rounded" name="" id="">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
               <div class="flex flex-wrap">
                <span class="flex mx-1 items-center text-lg">{{ $montant_valide_Fc.' Fc' }}
                    <div class="flex justify-center text-green-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                            <path d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z" />
                        </svg>
                    </div>
                </span>
                <span class="flex mx-1 items-center text-lg">{{ $montant_invalide_Fc.' Fc' }}
                    <div class="flex justify-center text-red-500 ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-exclamation" viewBox="0 0 16 16">
                            <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.553.553 0 0 1-1.1 0L7.1 4.995z" />
                        </svg>
                    </div>
                </span>
                <span class="flex mx-1 items-center text-lg">{{ $montant_valide_Usd.' $' }}
                    <div class="flex justify-center text-green-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                            <path d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z" />
                        </svg>
                    </div>
                </span>
                <span class="flex mx-1 items-center text-lg">{{ $montant_invalide_Usd.' $' }}
                    <div class="flex justify-center text-red-500 ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-exclamation" viewBox="0 0 16 16">
                            <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.553.553 0 0 1-1.1 0L7.1 4.995z" />
                        </svg>
                    </div>
                </span>
               </div>
                <a href="{{ route('home') }}" x-on:click="openadd=true,opentable=false" class="flex items-center h-10 px-2 my-2 text-white border rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 96 960 960" width="30">
                        <path
                            d="M220 876h150V626h220v250h150V486L480 291 220 486v390Zm-60 60V456l320-240 320 240v480H530V686H430v250H160Zm320-353Z" />
                    </svg>
                </a>
            </div>
            <div class="m-1 my-1 overflow-x-auto bg-white rounded shadow-md">
                {{ $dettes->links() }}
                <!-- <div class="flex justify-center">
                    <button wire:loading type="button" class="text-blue-500" disabled>
                        Processing...
                    </button>
                </div> -->
                <table class="w-full table-auto min-w-max">
                    <thead>
                        <tr class="text-sm leading-normal text-gray-600 uppercase bg-gray-200">
                            <th class="px-6 py-3 text-left">DATE</th>
                            <th class="px-6 py-3 text-left">PRODUIT</th>
                            <th class="px-6 py-3 text-left">QUANTITE</th>
                            <th class="px-6 py-3 text-left">PU</th>
                            <th class="px-6 py-3 text-left">PT</th>
                            <th class="px-6 py-3 text-left">SERVEUR</th>
                            <th class="px-6 py-3 text-left">PERSON</th>
                            <th class="px-6 py-3 text-left">ACTION</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm font-light text-gray-600">
                        @foreach ($dettes as $dette)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="px-6 py-3 text-left whitespace-nowrap">
                                <div class="flex items-center">
                                    <span class="font-medium">{{ $dette->date_dette }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-3 text-left whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="mr-2">
                                        <img class='w-8 h-8 rounded-full' src="{{ Storage::url($dette->produit->file) }}" alt="{{ __('') }}">
                                    </div>
                                    <span class="font-medium">{{ $dette->produit->designation }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-3 text-left whitespace-nowrap">
                                <div class="flex items-center">
                                    <span class="font-medium">{{ $dette->qte_dette }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-3 text-left whitespace-nowrap">
                                <div class="flex items-center">
                                    <span class="font-medium">{{ $dette->prix_vente }} FC</span>
                                </div>
                            </td>
                            <td class="px-6 py-3 text-left whitespace-nowrap">
                                <div class="flex items-center">
                                    <span class="font-medium">{{ $dette->qte_dette * $dette->prix_vente }} FC</span>
                                </div>
                            </td>
                            <td class="px-6 py-3 text-left whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="mr-2">
                                        <div class="mr-2">
                                            <img class='w-8 h-8 rounded-full' src="{{ Storage::url($dette->user->file) }}" alt="{{ __('') }}">
                                        </div>
                                    </div>
                                    <span class="font-medium">{{ $dette->user->name }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-3 text-left whitespace-nowrap">
                                <div class="flex items-center">
                                    <span class="font-medium">{{ $dette->name_dette }}</span>
                                </div>
                            </td>
                            <td class="inline-block px-6 py-3 text-left">
                                <div class="flex justify-center item-center">
                                    @if ($dette->payed)
                                    <div class="flex justify-center px-2 py-1 mr-5 font-medium text-green-500 transform rounded-full w-14 hover:scale-110 ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                                            <path d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z" />
                                        </svg>
                                    </div>
                                    <div class="flex items-center justify-center px-2 py-1 mr-5 font-medium text-green-500 transform rounded-full w-14 hover:scale-110 ">
                                        <span>payé</span>
                                    </div>
                                    @else
                                    @if (Auth::user()->is_server)
                                    <div class="flex justify-center px-2 py-1 mr-5 font-medium text-red-500 transform rounded-full w-14 hover:scale-110 ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation" viewBox="0 0 16 16">
                                            <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.553.553 0 0 1-1.1 0L7.1 4.995z" />
                                        </svg>
                                    </div>
                                    @endif
                                    @if (Auth::user()->is_comptoire or Auth::user()->is_admin)
                                    <div class="flex justify-center px-2 py-1 mr-5 font-medium text-red-500 transform rounded-full w-14 hover:scale-110 ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation" viewBox="0 0 16 16">
                                            <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.553.553 0 0 1-1.1 0L7.1 4.995z" />
                                        </svg>
                                    </div>
                                    <div class="flex items-center justify-center px-2 py-1 mr-5 text-white transform bg-red-300 rounded-full w-14 hover:scale-110 ">
                                        <a wire:click="valider({{ $dette->id }})" href="#">payer</a>
                                    </div>
                                    @endif
                                    @endif
                                    @if (Auth::user()->is_admin)
                                        @if (!$dette->payed)
                                            <div class="w-5 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                <svg wire:click="deleteVenteUnValide({{ $dette->id }})" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </div>
                                        @endif
                                    @endif

                                </div>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
