<div class="grid w-10/12 mx-auto bg-white shadow-lg rounded-2xl md:w-3/5 md:grid-cols-2 h-3/4">
    <div class="hidden w-full p-10 md:block h-96">
        <img class="object-fill w-full h-full rounded-tl-2xl rounded-bl-2xl" src="{{ asset('img/vendre.webp') }}"
            alt="" srcset="">
    </div>
    <div class="flex flex-col justify-around p-5">
        <form x-data="{ open : false }" wire:submit.prevent='submit' class="flex flex-col items-start justify-between">

            <div class="w-full my-3">
                <label for="">Selection le produit</label>
                <select wire:model='produit_id' wire:change='change' class="w-full h-10 p-1 pl-2 border rounded">
                    <option value="null">select produit</option>
                    @foreach ($produits as $produit)
                        @if (!$produit->deleted)
                        <option value="{{ $produit->id }}">{{ $produit->designation }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class='text-red-600'>
                @error('produit_id')
                    {{ $message }}
                @enderror
            </div>
            <div class="w-full my-3">
                <label for="">Quantite à vendre </label>
                <input class="w-full h-10 p-1 pl-2 border rounded" placeholder="ex: 1" wire:model="qte_vendu"
                    type="number">
            </div>
            <div class='text-red-600'>
                @error('qte_vendu')
                    {{ $message }}
                @enderror
            </div>
            <div class="w-full my-3">
                <label for="">Prix Unitaire</label>
                <input wire:model='prix_vente' class="w-full h-10 p-1 pl-2 border rounded" type="number">
            </div>
            <div class='text-red-600'>
                @error('prix_vente')
                    {{ $message }}
                @enderror
            </div>
            <div class="flex items-center ">
                <input wire:model='me' x-on:click="open =! open" id="me" class="w-5 h-5 p-1 pl-2 border rounded" type="checkbox">
                <label class="ml-5" for="me">select server</label>
            </div>
            <div x-show="open" x-transition.duration.500ms class="w-full my-3">
                <label for="">Selectionner le serveur</label>
                <select  wire:model='server_id' class="w-full h-10 p-1 pl-2 border rounded">
                    <option value="null">select serveur</option>
                    @foreach ($agents as $agent)
                        <option value="{{ $agent->id }}">{{ $agent->name }} {{ $agent->lastname }}</option>
                    @endforeach
                </select>
                <div class='text-red-600'>
                @error('server_id')
                    {{ $message }}
                @enderror
            </div>
            </div>

            <div class="w-full my-3">
                <input type="submit" class="w-full h-10 p-1 font-bold text-white bg-blue-500 rounded" />
            </div>

        </form>
    </div>
</div>
