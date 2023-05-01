<div x-data="{ view2:true }" class="overflow-x-auto">
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
                <a href="{{ route('home') }}" x-on:click="openadd=true,opentable=false" class="flex items-center h-10 px-2 my-2 text-white border rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 96 960 960" width="30">
                        <path
                            d="M220 876h150V626h220v250h150V486L480 291 220 486v390Zm-60 60V456l320-240 320 240v480H530V686H430v250H160Zm320-353Z" />
                    </svg>
                </a>
            </div>
            <div class="m-1 my-1 overflow-x-auto bg-white rounded shadow-md">
                {{-- {{ $rapports->links() }} --}}
                <!-- <div class="flex justify-center">
                    <button wire:loading type="button" class="text-blue-500" disabled>
                        Processing...
                    </button>
                </div> -->
                <table class="w-full table-auto min-w-max">
                    <thead>
                        <tr class="text-sm leading-normal text-gray-600 uppercase bg-gray-200">
                            <th class="px-6 py-3 text-left">DATE</th>
                            <th class="px-6 py-3 text-left">ARGENT ENTRE</th>
                            <th class="px-6 py-3 text-left">ARGENT BANQUE</th>
                            <th class="px-6 py-3 text-left">ARGENT CHEF</th>
                            {{-- <th class="px-6 py-3 text-left">ARGENT DEPENSER</th> --}}
                            <th class="px-6 py-3 text-left">ARGENT CAISSE</th>
                            <th class="px-6 py-3 text-left">ACTION</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm font-light text-gray-600">
                        @foreach ($caisses as $caisse)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="px-6 py-3 text-left whitespace-nowrap">
                                <div class="flex items-center">
                                    <span class="font-medium">{{ date('Y-m-d', strtotime($caisse->rapport->date_rapport)) }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-3 text-left whitespace-nowrap">
                                <div class="flex items-center text-green-500">
                                    <span class="font-medium">{{ $caisse->argent_entree }}FC</span>
                                    <span class="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                                            <path d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z" />
                                        </svg>
                                    </span>
                                </div>
                            </td>
                            <td class="px-6 py-3 text-left whitespace-nowrap">
                                <div class="flex items-center text-green-500">
                                    <span class="font-medium">{{ $caisse->argent_banque }}FC</span>
                                    <span class="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                                            <path d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z" />
                                        </svg>
                                    </span>
                                </div>
                            </td>
                            <td class="px-6 py-3 text-left whitespace-nowrap">
                                <div class="flex items-center text-green-500">
                                    <span class="font-medium">{{ $caisse->argent_chef }}FC</span>
                                    <span class="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                                            <path d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z" />
                                        </svg>
                                    </span>
                                </div>
                            </td>
                            {{-- <td class="px-6 py-3 text-left whitespace-nowrap">
                                <div class="flex items-center text-green-500">
                                    <span class="font-medium">{{ $caisse->depenser }}FC</span>
                                    <span class="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                                            <path d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z" />
                                        </svg>
                                    </span>
                                </div>
                            </td> --}}
                            <td class="px-6 py-3 text-left whitespace-nowrap">
                                <div class="flex items-center text-green-500">
                                    <span class="font-medium">{{ $caisse->argent_entree - $caisse->argent_banque -$caisse->argent_chef - $caisse->depenser }}FC</span>
                                    <span class="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                                            <path d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z" />
                                        </svg>
                                    </span>
                                </div>
                            </td>
                            <td class="px-6 py-3 text-left whitespace-nowrap">
                                <div class="w-5 mr-2 transform hover:text-purple-500 hover:scale-110">
                                    <a href="#" wire:click='startEdit({{ $caisse->id }})'>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @if ($idEdit == $caisse->id)
                            <tr>
                                <livewire:edit-caisse :caisse="$caisse" :key="$caisse->id" />
                            </tr>
                        @endif
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
