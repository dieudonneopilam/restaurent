<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/mask@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.0/dist/cdn.min.js"></script>

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body class="bg-white">
    <div class="my-10 w-10/12 mx-auto">
        <h1 class="text-2xl uppercase">Rapport Mensuel</h1>
        <h1 class="text-xl text-blue-500">Mois : Avril</h1>
    </div>
    <div class="mt-10 w-10/12 mx-auto overflow-x-auto bg-white rounded shadow-md">
        <table class="w-full table-auto min-w-max">
            <thead>
                <tr class="text-sm leading-normal text-gray-600 uppercase bg-gray-200">
                    <th class="px-6 py-3 text-left">DATE</th>
                    <th class="px-6 py-3 text-left">VENTES<br>VALIDES</th>
                    <th class="px-6 py-3 text-left">VENTES<br>INVALIDES</th>
                    <th class="px-6 py-3 text-left">DETTE<br>PAYEE</th>
                    <th class="px-6 py-3 text-left">DETTES<br>NON PAYEE</th>
                    <th class="px-6 py-3 text-left">ACHATS</th>
                    <th class="px-6 py-3 text-left">DEPENSES</th>
                    <th class="px-6 py-3 text-left">ARGENT<br>RECU</th>
                    <th class="px-6 py-3 text-left">ARGENT<br>NON RECU</th>
                    {{-- <th class="px-6 py-3 text-left">ACTION</th> --}}
                </tr>
            </thead>
            <tbody class="text-sm font-light text-gray-600">
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="px-6 py-3 text-left whitespace-nowrap">
                        <div class="flex items-center">
                            <span
                                class="font-medium">2023-04-01</span>
                        </div>
                    </td>
                    <td class="px-6 py-3 text-left whitespace-nowrap">
                        <div class="flex items-center text-red-500">
                            <span class="font-medium">400 FC</span>
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
                            <span class="font-medium">400FC</span>
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
                        <div class="flex items-center">
                            <span class="font-medium">5000</span>
                        </div>
                    </td>
                    <td class="px-6 py-3 text-left whitespace-nowrap">
                        <div class="flex items-center">
                            <span class="font-medium">500</span>
                        </div>
                    </td>
                    <td class="px-6 py-3 text-left whitespace-nowrap">
                        <div class="flex items-center text-red-500">
                            <span
                                class="font-medium">100FC</span>
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
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="px-6 py-3 text-left whitespace-nowrap">
                        <div class="flex items-center">
                            <span
                                class="font-medium">500</span>
                        </div>
                    </td>
                    <td class="px-6 py-3 text-left whitespace-nowrap">
                        <div class="flex items-center text-red-500">
                            <span class="font-medium">400 FC</span>
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
                            <span class="font-medium">400FC</span>
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
                        <div class="flex items-center">
                            <span class="font-medium">5000</span>
                        </div>
                    </td>
                    <td class="px-6 py-3 text-left whitespace-nowrap">
                        <div class="flex items-center">
                            <span class="font-medium">500</span>
                        </div>
                    </td>
                    <td class="px-6 py-3 text-left whitespace-nowrap">
                        <div class="flex items-center text-red-500">
                            <span
                                class="font-medium">100FC</span>
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

            </tbody>
        </table>

    </div>
    @livewireScripts
</body>

</html>
