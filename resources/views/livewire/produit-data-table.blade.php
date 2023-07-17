<div class="overflow-x-auto">
    <div class="flex items-center justify-center p-2 overflow-hidden font-sans bg-gray-100 min-w-screen">
        <div class="w-full m-5 lg:w-5/6">
            <div class="flex flex-wrap-reverse items-center justify-between">

                <input class="w-full h-10 px-5 border rounded sm:w-2/3" wire:model="search" placeholder="search produit">
                <div class="flex items-center justify-center ">
                    <a class="mr-5 text-blue-400" href="{{ route('home') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 96 960 960" width="30">
                            <path
                                d="M220 876h150V626h220v250h150V486L480 291 220 486v390Zm-60 60V456l320-240 320 240v480H530V686H430v250H160Zm320-353Z" />
                        </svg>
                    </a>
                </div>
                @if (Auth::user()->is_admin or Auth::user()->is_comptoire)
                <a href="{{ route('produit.create') }}"
                class="flex items-center h-10 px-2 my-2 text-white bg-blue-500 border rounded">Nouveau Produit</a>
                @endif
            </div>
            <div class="m-1 my-1 overflow-x-auto bg-white rounded shadow-md">
                <table class="w-full table-auto min-w-max">
                    <thead>
                        <tr class="text-sm leading-normal text-gray-600 uppercase bg-gray-200">
                            <th class="px-6 py-3 text-left">DATE</th>
                            <th class="px-6 py-3 text-left">PRODUIT</th>
                            <th class="px-6 py-3 text-left">STOCK INITIAL</th>
                            <th class="px-6 py-3 text-left">QUANTITE EN STOCK</th>
                            <th class="px-6 py-3 text-left">PRIX VENTE</th>
                            <th class="px-6 py-3 text-left">STOCK ALERTE</th>
                            @if (Auth::user()->is_admin or Auth::user()->is_comptoire)
                            <th class="px-6 py-3 text-left">ACTION</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody class="text-sm font-light text-gray-600">
                        @foreach ($produits as $produit)

                            @if (!$produit->deleted)
                                <tr class="border-b @if($produit->stock_alerte >= $produit->qte) bg-red-200 @endif border-gray-200 hover:bg-gray-100">
                                    <td class="px-6 py-3 text-left whitespace-nowrap">
                                        <div class="flex items-center">
                                            <span class="font-medium">{{ $produit->created_at }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-3 text-left whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="mr-2">
                                                <img class='w-8 h-8 rounded-full'
                                                    src="{{ Storage::url($produit->file) }}" alt="{{ __('') }}">
                                            </div>
                                            <span class="font-medium">{{ $produit->designation }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-3 text-left whitespace-nowrap">
                                        <div class="flex items-center">
                                            <span class="font-medium">{{ $produit->qte_init }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-3 text-left whitespace-nowrap">
                                        <div class="flex items-center">
                                            <span class="font-medium">{{ $produit->qte }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-3 text-left whitespace-nowrap">
                                        <div class="flex items-center">
                                            <span class="font-medium">{{ $produit->prix_vente.' '. $produit->devise_prix }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-3 text-left whitespace-nowrap">
                                        <div class="flex items-center">
                                            <span class="font-medium">{{ $produit->stock_alerte }}</span>
                                        </div>
                                    </td>
                                    @if (Auth::user()->is_admin or Auth::user()->is_comptoire)
                                    <td class="inline-block px-6 py-3 text-left">
                                        <div class="flex justify-center item-center">
                                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                <a href="{{ route('produit.edit', $produit->id) }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                    </svg>
                                                </a>
                                            </div>
                                            {{-- <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                <a href='#' wire:click='delete({{ $produit->id }})'>
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </a>
                                            </div> --}}
                                        </div>
                                    </td>
                                    @endif
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
