@extends('layouts.app')
@section('main')
<div class="container flex flex-col w-11/12 p-5 mx-auto mt-5 bg-white shadow-xl rounded-3xl ">
    <h1 class="mb-1 text-2xl text-center">Tous Les Achats</h1>
    <div class="  rounded-md md:p-20 p-1 items-end">
       <div class="text-right mb-2 mt-2">
        <a href="" class="pl-3 pr-3 pt-1 pb-1 rounded-full mr-auto bg-blue-300 max-w-max">nouveau poduit</a>
       </div>
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full text-center text-sm font-light">
                            <thead class="border-b font-medium dark:border-neutral-500">
                                <tr>
                                    <th scope="col" class="px-6 py-2">N°</th>
                                    <th scope="col" class="px-6 py-2">photo</th>
                                    <th scope="col" class="px-6 py-2">name</th>
                                    <th scope="col" class="px-6 py-2">action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b dark:border-neutral-500">
                                    <td class="whitespace-nowrap px-6 py-2 font-medium">1</td>
                                    <td class="whitespace-nowrap px-6 py-2">Mark</td>
                                    <td class="whitespace-nowrap px-6 py-2">Otto</td>
                                    <td class="whitespace-nowrap px-6 py-2">@mdo</td>
                                </tr>
                                <tr class="border-b dark:border-neutral-500">
                                    <td class="whitespace-nowrap px-6 py-2 font-medium">2</td>
                                    <td class="whitespace-nowrap px-6 py-2 ">Jacob</td>
                                    <td class="whitespace-nowrap px-6 py-2">Thornton</td>
                                    <td class="whitespace-nowrap px-6 py-2">@fat</td>
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
