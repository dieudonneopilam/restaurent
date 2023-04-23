<div class="overflow-x-auto">
    <div class="min-w-screen  flex items-center p-2 justify-center bg-gray-100 font-sans overflow-hidden">
        <div class="w-full m-5 lg:w-5/6">
            <div class="flex flex-wrap-reverse justify-between items-center">
                
                <input class="h-10 rounded border w-full sm:w-2/3 px-5" wire:model="search" placeholder="search vente">
                <div class="flex items-center justify-center ">
                    <a class="mr-5 text-blue-400" href="{{ route('home') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 96 960 960" width="30">
                            <path
                                d="M220 876h150V626h220v250h150V486L480 291 220 486v390Zm-60 60V456l320-240 320 240v480H530V686H430v250H160Zm320-353Z" />
                        </svg>
                    </a>
                </div>
                <a href="{{ route('achat.create') }}"
                    class="flex items-center text-white my-2 bg-blue-500 rounded border h-10 px-2">Nouvel Achat</a>
            </div>
            <div class="bg-white shadow-md rounded my-1 overflow-x-auto m-1">
                <table class="min-w-max w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">DATE</th>
                            <th class="py-3 px-6 text-left">PRODUIT</th>
                            <th class="py-3 px-6 text-left">QUANTITE ACHETER</th>
                            <th class="py-3 px-6 text-left">PRIX TOTAL ACHAT</th>
                            <th class="py-3 px-6 text-left">ACTION</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @foreach ($achats as $achat)
                            @if (!$achat->deleted)
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-3 px-6 text-left whitespace-nowrap">
                                        <div class="flex items-center">
                                            <span class="font-medium">{{ $achat->date_achat }}</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="mr-2">
                                                <img class='w-8 h-8 rounded-full'
                                                    src="{{ Storage::url($achat->produit->file) }}" alt="{{ __('') }}">
                                            </div>
                                            <span class="font-medium">{{ $achat->produit->designation }}</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left whitespace-nowrap">
                                        <div class="flex items-center">
                                            <span class="font-medium">{{ $achat->qte_achat }}</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left whitespace-nowrap">
                                        <div class="flex items-center">
                                            <span class="font-medium">{{ $achat->prix_achat }}</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left inline-block">
                                        <div class="flex item-center justify-center">
                                            <div class="w-4 mr-2 transform hover:text-purple-500  hover:scale-110">
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
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
