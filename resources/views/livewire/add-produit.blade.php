<div class="grid w-10/12 mx-auto bg-white shadow-lg rounded-2xl md:w-3/5 md:grid-cols-2 h-3/4">
    <div class="relative items-center justify-center hidden w-full h-96 md:flex">
        <img class="object-fill w-full h-full rounded-tl-2xl rounded-2xl" src="{{ asset('img/add.png') }}" alt="" srcset="">
    </div>
    <div class="flex flex-col justify-around p-5">
        <div class="flex items-center justify-start ">
            <a class="mr-5 text-blue-400" href="{{ route('produit.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-reply-fill" viewBox="0 0 16 16">
                    <path d="M5.921 11.9 1.353 8.62a.719.719 0 0 1 0-1.238L5.921 4.1A.716.716 0 0 1 7 4.719V6c1.5 0 6 0 7 8-2.5-4.5-7-4-7-4v1.281c0 .56-.606.898-1.079.62z"/>
                  </svg>
            </a>
            <span class="text-xl">Nouveau Produit</span>
        </div>
        <form class="flex flex-col items-start justify-between" wire:submit.prevent='submit' action="" enctype="multipart/form-data">
            <div class="w-full mt-3">
                <input class="w-full h-10 p-1 pl-2 border rounded" wire:model.defer='designation' placeholder="nom produit" type="text">
            </div>
            <div class='ml-3 text-red-600'>
                @error('designation')
                    {{ $message }}
                @enderror
            </div>
            <div class="w-full mt-3">
                <input class="w-full h-10 p-1 pl-2 border rounded" placeholder="Quantité initiale" wire:model.defer='qte_initial' type="text">
            </div>
            <div class='ml-3 text-red-600'>
                @error('qte_initial')
                    {{ $message }}
                @enderror
            </div>
            <div class="w-full mt-3">
                <input class="w-full h-10 p-1 pl-2 border rounded" placeholder="Prix vente caisse" wire:model.defer='prix_vente' type="number">
            </div>
            <div class='ml-3 text-red-600'>
                @error('prix_vente')
                    {{ $message }}
                @enderror
            </div>
            <div class="w-full mt-3">
                <select wire:model="devise_vente" class="w-full h-10 p-1 pl-2 border rounded">
                    <option value="null">devise prix vente</option>
                    <option value="Fc">FC</option>
                    {{-- <option value="$">USD</option> --}}
                </select>
            </div>
            <div class='ml-3 text-red-600'>
                @error('devise_vente')
                    {{ $message }}
                @enderror
            </div>
            <div class="w-full mt-3">
                <input class="w-full h-10 p-1 pl-2 border rounded" placeholder="Stock Alert" wire:model.defer='stock_alerte' type="number">
            </div>

            <div class='ml-3 text-red-600'>
                @error('stock_alerte')
                    {{ $message }}
                @enderror
            </div>
            <div class="w-full mt-3">
                <input class="w-full h-10 p-1 pl-2 border rounded" type="file" wire:model.defer='file'>
            </div>
            <div class='ml-3 text-red-600'>
                @error('file')
                    {{ $message }}
                @enderror
            </div>
            <div class="w-full mt-3">
                <button class="w-full h-10 p-1 font-bold text-white bg-blue-500 rounded" type="submit">Enregistrer</button>
            </div>
        </form>
    </div>
</div>
