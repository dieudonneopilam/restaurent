<div x-data="{ view2: false, view3:false, table:true }" class="overflow-x-auto">
    <div x-show="view2" class="flex items-center justify-center p-2 overflow-hidden font-sans bg-white min-w-screen">
        <div class="w-full m-5 lg:w-5/6">
            <div class="flex flex-wrap-reverse items-center justify-between mx-1">
                <span class="block h-10 text-lg text-blue-500 ">New Rapport => Date : </span>
                <div class="w-full h-10 sm:w-2/3">

                    <input x-model="dateReporte" x-mask="9999-99-99" class="w-4/5 h-full px-5 border rounded sm:w-1/2"
                        wire:model.debounce.500ms="searchRapport" placeholder="AAAA/MM/JR">

                </div>
                <a href="#" x-on:click="view2=false" class="flex items-center h-10 px-2 my-2 border rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                        class="bi bi-eye-slash" viewBox="0 0 16 16">
                        <path
                            d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z" />
                        <path
                            d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z" />
                        <path
                            d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z" />
                    </svg>
                </a>
            </div>
            <div class="m-1 my-1 overflow-x-auto bg-white rounded shadow-md">
                <!-- <div class="flex justify-center">
                    <button wire:loading type="button" class="text-blue-500" disabled>
                        Processing...
                    </button>
                </div> -->
                <table class="w-full table-auto min-w-max">
                    <thead>
                        <tr class="text-sm leading-normal text-gray-600 uppercase bg-gray-200">
                            <th class="px-6 py-3 text-left">DATE</th>
                            <th class="px-6 py-3 text-left">VENTE</th>
                            <th class="px-6 py-3 text-left">DETTES</th>
                            <th class="px-6 py-3 text-left">ACHATS</th>
                            <th class="px-6 py-3 text-left">DEPENSES</th>
                            <th class="px-6 py-3 text-left">RESTES</th>
                            <th class="px-6 py-3 text-left">ACTION</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm font-light text-gray-600">
                        @if ($montant_vente_valide)
                            <tr x-show="dateReport.length >= 10" class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="px-6 py-3 text-left whitespace-nowrap">
                                    <div class="flex items-center text-green-500">
                                        <span class="font-medium">{{ $montant_vente_valide }}FC</span>
                                        <span class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                                                <path
                                                    d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="flex items-center text-red-500">
                                        <span class="font-medium">{{ $montant_vente_invalide }}FC</span>
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-exclamation" viewBox="0 0 16 16">
                                                <path
                                                    d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.553.553 0 0 1-1.1 0L7.1 4.995z" />
                                            </svg>
                                        </span>
                                    </div>
                                </td>
                                <td class="px-6 py-3 text-left whitespace-nowrap">
                                    <div class="flex items-center text-green-500">
                                        <span class="font-medium">{{ $montant_vente_valide }}FC</span>
                                        <span class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                                                <path
                                                    d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="flex items-center text-red-500">
                                        <span class="font-medium">{{ $montant_vente_invalide }}FC</span>
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-exclamation" viewBox="0 0 16 16">
                                                <path
                                                    d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.553.553 0 0 1-1.1 0L7.1 4.995z" />
                                            </svg>
                                        </span>
                                    </div>
                                </td>
                                <td class="px-6 py-3 text-left whitespace-nowrap">
                                    <div class="flex items-center text-green-500">
                                        <span class="font-medium">{{ $montant_dette_valide }}FC</span>
                                        <span class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                                                <path
                                                    d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="flex items-center text-red-500">
                                        <span class="font-medium">{{ $montant_dette_invalide }}FC</span>
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-exclamation" viewBox="0 0 16 16">
                                                <path
                                                    d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.553.553 0 0 1-1.1 0L7.1 4.995z" />
                                            </svg>
                                        </span>
                                    </div>
                                </td>
                                <td class="px-6 py-3 text-left whitespace-nowrap">
                                    <div class="flex items-center text-green-500">
                                        <span class="font-medium">{{ $montant_achat }}FC</span>
                                        <span class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                                                <path
                                                    d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z" />
                                            </svg>
                                        </span>
                                    </div>
                                </td>
                                <td class="px-6 py-3 text-left whitespace-nowrap">
                                    <div class="flex items-center text-green-500">
                                        <span class="font-medium">{{ $montant_depenses }}FC</span>
                                        <span class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                                                <path
                                                    d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z" />
                                            </svg>
                                        </span>
                                    </div>
                                </td>
                                <td class="px-6 py-3 text-left whitespace-nowrap">
                                    <div class="flex items-center text-green-500">
                                        <span
                                            class="font-medium">{{ $montant_vente_valide + $montant_dette_valide - $montant_depenses - $montant_achat }}FC</span>
                                        <span class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                                                <path
                                                    d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="flex items-center text-red-500">
                                        <span
                                            class="font-medium">{{ $montant_vente_invalide + $montant_dette_invalide }}FC</span>
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-exclamation" viewBox="0 0 16 16">
                                                <path
                                                    d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.553.553 0 0 1-1.1 0L7.1 4.995z" />
                                            </svg>
                                        </span>
                                    </div>
                                </td>
                                <td class="inline-block px-6 py-3 text-left">
                                    <div class="flex justify-center item-center">
                                        @if (!$is_report)
                                            @if ($montant_vente_valide)
                                                <div x-show="dateReporte.length >= 10"
                                                    class="px-2 py-1 mr-5 text-white transform bg-green-500 rounded-full w-14 hover:scale-110 ">
                                                    <a wire:click="valider({{ $searchRapport }})"
                                                        href="#">valider</a>
                                                </div>
                                            @endif
                                        @elseif ($is_report->count())
                                            <div x-on:click="view2=false" x-show="dateReporte.length >= 10"
                                                class="px-2 py-1 mr-5 text-white transform bg-green-500 rounded-full w-14 hover:scale-110 ">
                                                <a wire:click="updatereport({{ $is_report->id }})"
                                                    href="#">update</a>
                                            </div>
                                        @endif

                                    </div>
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td class="px-6 py-3 text-left whitespace-nowrap">
                                    <div class="flex items-center text-red-500">
                                        <span class="font-medium">Aucune vente realisé ce jour ci</span>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    @if (session()->has('message'))
        <div class="flex items-center justify-center w-11/12 h-12 mx-auto text-black bg-green-300 rounded md:w-10/12 ">
            {{ session('message') }}
        </div>
    @endif
    <div class="flex items-center justify-center p-2 overflow-hidden font-sans bg-white min-w-screen">
        <div class="w-full m-5 lg:w-5/6">
            <div class="flex flex-wrap-reverse items-center justify-between mx-1">
                <div x-show="table" class="w-full h-10 sm:w-2/3">
                    <input x-mask="9999-99-99" class="w-4/5 h-full px-5 border rounded sm:w-1/2"
                        wire:model.debounce.1000ms="search" placeholder="AAAA/MM/JR">
                    <select wire:model='nbpage' class="w-1/6 h-full px-1 border rounded" name=""
                        id="">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
                <div class="flex items-center">
                    <a href="{{ route('home') }}" x-on:click="openadd=true,opentable=false"
                    class="flex items-center h-10 px-2 mx-2 my-2 text-white border rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 96 960 960" width="30">
                        <path
                            d="M220 876h150V626h220v250h150V486L480 291 220 486v390Zm-60 60V456l320-240 320 240v480H530V686H430v250H160Zm320-353Z" />
                    </svg>
                </a>
                <a href="#" x-on:click="view2=true"
                    class="flex items-center h-10 px-2 mx-2 my-2 text-blue-500 border rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                        class="bi bi-building-add" viewBox="0 0 16 16">
                        <path
                            d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Z" />
                        <path
                            d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v6.5a.5.5 0 0 1-1 0V1H3v14h3v-2.5a.5.5 0 0 1 .5-.5H8v4H3a1 1 0 0 1-1-1V1Z" />
                        <path
                            d="M4.5 2a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm-6 3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm-6 3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Z" />
                    </svg>
                </a>
                </div>
            </div>
            <div x-show="table" class="m-1 my-1 overflow-x-auto bg-white rounded shadow-md">
                {{ $rapports->links() }}
                <!-- <div class="flex justify-center">
                    <button wire:loading type="button" class="text-blue-500" disabled>
                        Processing...
                    </button>
                </div> -->
                <table class="w-full table-auto min-w-max">
                    <thead>
                        <tr class="text-sm leading-normal text-gray-600 uppercase bg-gray-200">
                            <th class="px-6 py-3 text-left">DATE</th>
                            <th class="px-6 py-3 text-left">VENTES</th>
                            <th class="px-6 py-3 text-left">DETTES</th>
                            <th class="px-6 py-3 text-left">ACHATS</th>
                            <th class="px-6 py-3 text-left">DEPENSES</th>
                            <th class="px-6 py-3 text-left">RESTES</th>
                            {{-- <th class="px-6 py-3 text-left">ACTION</th> --}}
                        </tr>
                    </thead>
                    <tbody class="text-sm font-light text-gray-600">
                        @foreach ($rapports as $rapport)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="px-6 py-3 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span
                                            class="font-medium">{{ date('Y-m-d', strtotime($rapport->date_rapport)) }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-3 text-left whitespace-nowrap">
                                    <div class="flex items-center text-green-500">
                                        <span class="font-medium">{{ $rapport->vente_jour }}FC</span>
                                        <span class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                                                <path
                                                    d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="flex items-center text-red-500">
                                        <span class="font-medium">{{ $rapport->vente_non_payed }}FC</span>
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-exclamation" viewBox="0 0 16 16">
                                                <path
                                                    d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.553.553 0 0 1-1.1 0L7.1 4.995z" />
                                            </svg>
                                        </span>
                                    </div>
                                </td>
                                <td class="px-6 py-3 text-left whitespace-nowrap">
                                    <div class="flex items-center text-green-500">
                                        <span class="font-medium">{{ $rapport->dette_jour }}FC</span>
                                        <span class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                                                <path
                                                    d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="flex items-center text-red-500">
                                        <span class="font-medium">{{ $rapport->dette_non_payer }}FC</span>
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-exclamation" viewBox="0 0 16 16">
                                                <path
                                                    d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.553.553 0 0 1-1.1 0L7.1 4.995z" />
                                            </svg>
                                        </span>
                                    </div>
                                </td>
                                <td class="px-6 py-3 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{ $rapport->achat_jour }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-3 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{ $rapport->depense_jour }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-3 text-left whitespace-nowrap">
                                    <div class="flex items-center text-green-500">
                                        <span
                                            class="font-medium">{{ $rapport->vente_jour + $rapport->dette_jour - $rapport->achat_jour - $rapport->depense_jour }}
                                            FC</span>
                                        <span class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                                                <path
                                                    d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="flex items-center text-red-500">
                                        <span
                                            class="font-medium">{{ $rapport->vente_non_payer + $rapport->dette_non_payer }}FC</span>
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-exclamation" viewBox="0 0 16 16">
                                                <path
                                                    d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.553.553 0 0 1-1.1 0L7.1 4.995z" />
                                            </svg>
                                        </span>
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
