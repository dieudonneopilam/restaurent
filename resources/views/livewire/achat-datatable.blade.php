<div class="overflow-x-auto">
    <div class="flex items-center justify-center p-2 overflow-hidden font-sans bg-gray-100 min-w-screen">
        <div class="w-full m-5 lg:w-5/6">
            <div class="flex flex-wrap-reverse items-center justify-between">

                <input class="w-full h-10 px-5 border rounded sm:w-2/3" wire:model="search" placeholder="search vente" x-mask="9999-99-99">
                {{-- <span class="flex items-center text-lg">{{ $montant.' Fc' }}
                    <div class="flex justify-center text-green-500 ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                            <path d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z" />
                        </svg>
                    </div>
                </span> --}}
                <div class="flex items-center justify-center ">
                    <a class="mr-5 text-blue-400" href="{{ route('home') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 96 960 960" width="30">
                            <path
                                d="M220 876h150V626h220v250h150V486L480 291 220 486v390Zm-60 60V456l320-240 320 240v480H530V686H430v250H160Zm320-353Z" />
                        </svg>
                    </a>
                </div>
                @if (!Auth::user()->is_visit)
                    <a href="{{ route('achat.create') }}"
                        class="flex items-center h-10 px-2 my-2 text-white bg-blue-500 border rounded">Nouvel Achat
                    </a>
                @endif
            </div>
            <div class="m-1 my-1 overflow-x-auto bg-white rounded shadow-md">
                <table class="w-full table-auto min-w-max">
                    <thead>
                        <tr class="text-sm leading-normal text-gray-600 uppercase bg-gray-200">
                            <th class="px-6 py-3 text-left">DATE</th>
                            <th class="px-6 py-3 text-left">PRODUIT</th>
                            <th class="px-6 py-3 text-left">QUANTITE ACHETER</th>
                            {{-- <th class="px-6 py-3 text-left">PRIX TOTAL ACHAT</th> --}}
                            <th class="px-6 py-3 text-left">ACTION</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm font-light text-gray-600">
                        @forelse ($achats as $achat)
                            @if (!$achat->deleted)
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="px-6 py-3 text-left whitespace-nowrap">
                                        <div class="flex items-center">
                                            <span class="font-medium">{{ $achat->date_achat }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-3 text-left whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="mr-2">
                                                <img class='w-8 h-8 rounded-full'
                                                    src="{{ Storage::url($achat->produit->file) }}" alt="{{ __('') }}">
                                            </div>
                                            <span class="font-medium">{{ $achat->produit->designation }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-3 text-left whitespace-nowrap">
                                        <div class="flex items-center">
                                            <span class="font-medium">{{ $achat->qte_achat }}</span>
                                        </div>
                                    </td>
                                    {{-- <td class="px-6 py-3 text-left whitespace-nowrap">
                                        <div class="flex items-center">
                                            <span class="font-medium">{{ $achat->prix_achat }} FC</span>
                                        </div>
                                    </td> --}}
                                    <td class="inline-block px-6 py-3 text-left">
                                        @if (Auth::user()->is_admin or Auth::user()->is_comptoire)
                                        <div class="flex justify-center item-center">
                                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                <a href='#' wire:click='delete({{ $achat->id }})'>
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                        @else
                                            <div class="flex justify-center item-center">
                                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                    ...
                                                </div>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        @empty
                            <tr>
                                <td colspan="5" >
                                    <div class="flex items-center text-red-500">
                                        <span class="font-medium">aucun achat pour cette date</span>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
