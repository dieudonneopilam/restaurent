<td class="my-2 border-b-2" colspan="7">
   <form class="flex items-center justify-around w-full" action="" wire:submit.prevent='save' >
    @csrf
        <div class="">
            <label class="block font-semibold" for="">argent entree</label>
            <input  wire:model.defer='caisse.argent_entree' disabled class="w-32 h-8 p-1 text-lg rounded" type="number">
            @error('caisse.argent_entree')
                <div class="text-red-500">
                    non null
                </div>
            @enderror
        </div>
        <div>
            <label class="block font-semibold" for="">argent banque</label>
            <input required wire:model.defer='caisse.argent_banque' class="h-8 p-1 border rounded" type="number">
            @error('caisse.argent_banque')
                <div class="text-red-500">
                    non null
                </div>
            @enderror
        </div>
        <div>
            <label class="block font-semibold" for="">argent chef</label>
            <input required wire:model.defer='caisse.argent_chef' class="w-32 h-8 p-1 border rounded" type="number">
            @error('caisse.argent_chef')
                <div class="text-red-500">
                    non null
                </div>
            @enderror
        </div>
        {{-- <div>
            <label class="block font-semibold" for="">argent depenser</label>
            <input required wire:model.defer='caisse.depenser' class="w-32 h-8 p-1 border rounded" type="number">
            @error('caisse.depenser')
                <div class="text-red-500">
                    non null
                </div>
            @enderror
        </div> --}}
        <div>
            <label class="block font-semibold" for="">argent en caisse</label>
            <input disabled wire:model.defer='reste' class="h-8 p-1 border rounded" type="number">
            @error('reste')
                <div class="text-red-500">
                    impossible d'avoir un nombre negatif
                </div>
            @enderror
        </div>
        <div>
            <button type="submit" class="h-8 px-5 font-bold text-white bg-blue-400 rounded">Edit</button>
        </div>
   </form>
</td>
