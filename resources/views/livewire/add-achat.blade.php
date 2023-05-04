<div class="grid w-10/12 mx-auto bg-white shadow-lg rounded-2xl md:w-3/5 md:grid-cols-2 h-3/4">
    <div class="hidden w-full p-10 md:block h-96">
        <img class="object-fill w-full h-full rounded-tl-2xl rounded-bl-2xl" src="{{ asset('img/achat.png') }}" alt="" srcset="">
    </div>
    <div class="flex flex-col justify-around p-5">
    <div class="flex items-center justify-start ">
            <a class="mr-5 text-blue-400" href="{{ route('achat.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-reply-fill" viewBox="0 0 16 16">
                    <path d="M5.921 11.9 1.353 8.62a.719.719 0 0 1 0-1.238L5.921 4.1A.716.716 0 0 1 7 4.719V6c1.5 0 6 0 7 8-2.5-4.5-7-4-7-4v1.281c0 .56-.606.898-1.079.62z"/>
                  </svg>
            </a>
            <span class="text-xl">Nouveau Achat</span>
        </div>
        <form wire:submit.prevent='submit' class="flex flex-col items-start justify-between">

            <div class="w-full m-3">
                <label for="">Selection le produit</label>
                <select wire:model='produit_id' class="w-full h-10 p-1 pl-2 border rounded">
                    <option value="null">select produit</option>
                    @foreach ($produits as $produit)
                        @if (!$produit->deleted)
                            <option value="{{ $produit->id }}">{{ $produit->designation }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class='ml-3 text-red-600'>
                @error('produit_id')
                    {{ $message }}
                @enderror
            </div>
            <div class="w-full m-3">
                <label for="">Quantite achete en bouteille</label>
                <input wire:model="qte_achat" class="w-full h-10 p-1 pl-2 border rounded" placeholder="" type="number">
            </div>
            <div class='ml-3 text-red-600'>
                @error('qte_achat')
                    {{ $message }}
                @enderror
            </div>
            <div class="w-full m-3">
                <label for="">Prix Total</label>
                <input wire:model='prix_achat' class="w-full h-10 p-1 pl-2 border rounded" type="number">
            </div>
            <div class='ml-3 text-red-600'>
                @error('prix_achat')
                    {{ $message }}
                @enderror
            </div>
            <div class="w-full m-3">
                <button type="submit" class="w-full h-10 p-1 font-bold text-white bg-blue-500 rounded">Enregistrer</button>
            </div>
        </form>
    </div>
</div>
