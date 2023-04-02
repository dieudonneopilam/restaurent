<div class="grid w-10/12 mx-auto bg-white shadow-lg rounded-2xl md:w-3/5 md:grid-cols-2 h-3/4">
    <div class="hidden w-full p-10 md:block h-96">
        <img class="object-fill w-full h-full rounded-tl-2xl rounded-bl-2xl" src="{{ asset('img/vente1.jpg') }}" alt="" srcset="">
    </div>
    <div class="flex flex-col justify-around p-5">
        <form wire:submit.prevent='submit' class="flex flex-col items-center justify-between">

            <div class="w-full m-3">
                <label for="">Selection le produit</label>
                <select wire:model='produit_id' class="w-full h-10 p-1 pl-2 border rounded">
                    <option value="">PRIMUS</option>
                </select>
            </div>
            <div class="w-full m-3">
                <label for="">Quantite à vendre </label>
                <input type="number"  class="w-full h-10 p-1 pl-2 border rounded" placeholder="ex: 1"  wire:model="qte">
            </div>
            <div class="w-full m-3">
                <label for="">Prix Unitaire</label>
                <input wire:model='prix' class="w-full h-10 p-1 pl-2 border rounded" type="number">
            </div>
            <div class="w-full m-3">
                <input type="submit" class="w-full h-10 p-1 font-bold text-white bg-blue-500 rounded"/>
            </div>
        </form>
    </div>
</div>
