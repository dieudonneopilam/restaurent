<div class="bg-white rounded-2xl w-10/12 md:w-3/5 md:grid-cols-2 mx-auto grid h-3/4 shadow-lg">
    <div class=" hidden md:block h-96 w-full p-10">
        <img class="w-full h-full object-fill rounded-tl-2xl rounded-bl-2xl" src="{{ asset('img/vente1.jpg') }}" alt="" srcset="">
    </div>
    <div class="flex flex-col p-5 justify-around">
        <form class="flex flex-col items-center justify-between">
            <div class="w-full m-3">
                <label for="">Selection le produit</label>
                <select class="p-1 w-full border rounded h-10 pl-2" id="">
                    <option value="1">PRIMUS</option>
                </select>
            </div>
            <div class="w-full m-3">
                <label for="">Quantite à vendre </label>
                <input wire:model='qte' class="p-1 w-full border rounded h-10 pl-2" placeholder="ex: 1" type="number">
            </div>
            <div class="w-full m-3">
                <label for="">Prix Unitaire</label>
                <input wire:model='prix' class="w-full p-1 border rounded h-10 pl-2" type="number">
            </div>
            <div class="w-full m-3">
                <button wire:click='submit' class="w-full rounded bg-blue-500 p-1 h-10 text-white font-bold">Enregistrer</button>
            </div>
        </form>
    </div>
</div>
