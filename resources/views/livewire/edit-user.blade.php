<div class="bg-white rounded-2xl w-10/12 md:w-3/5 md:grid-cols-2 mx-auto grid h-3/4 shadow-lg">
    <div class=" hidden md:block h-96 w-full p-10">
        <img class="w-full h-full object-fill rounded-tl-2xl rounded-bl-2xl" src="{{ Storage::url($user->file) }}" alt="" srcset="">
    </div>
    <div class="flex flex-col p-5 justify-around">
        <form wire:submit.prevent='submit' class="flex flex-col items-start justify-between">
            <div class="w-full m-3">
                <input wire:model='nom'  placeholder='enter le nom' class="p-1 w-full border rounded h-10 pl-2" value='{{ $user->name }}'  type="text">
            </div>
            <div class='text-red-600 ml-3'>
                @error('nom')
                    {{ $message }}
                @enderror
            </div>
            <div class="w-full m-3">
                <input wire:model='prenom' value='{{ $user->lastname }}' placeholder='enter le prenom' class="p-1 w-full border rounded h-10 pl-2"  type="text">
            </div>
            <div class='text-red-600 ml-3'>
                @error('prenom')
                    {{ $message }}
                @enderror
            </div>
            <div class="w-full m-3">
                <input wire:model='mail' value='{{ $user->email }}' placeholder='enter le mail' class="p-1 w-full border rounded h-10 pl-2" type="email">
            </div>
            <div class='text-red-600 ml-3'>
                @error('mail')
                    {{ $message }}
                @enderror
            </div>
            <div class="w-full m-3">
                <select wire:model='fonction' value='{{ $user->is_admin }}' class="w-full h-10 p-1 pl-2 border rounded">
                    <option value="null">select fonction</option>
                    <option value="serveur">Serveur</option>
                    <option value="admin">admin</option>
                    <option value="comptoire">Comptoire</option>
                </select>
            </div>
            <div class='text-red-600 ml-3'>
                @error('fonction')
                    {{ $message }}
                @enderror
            </div>
            <div class="w-full m-3">
                <input wire:model='password' value='{{ $user->password }}' placeholder='enter le password' class="p-1 w-full border rounded h-10 pl-2"  type="password">
            </div>
            <div class='text-red-600 ml-3'>
                @error('password')
                    {{ $message }}
                @enderror
            </div>
            <div class="w-full m-3">
                <input wire:model='confirm' value='{{ $user->password }}' placeholder='confirm votre password' class="p-1 w-full border rounded h-10 pl-2" type="password">
            </div>
            <div class='text-red-600 ml-3'>
                @error('confirm')
                    {{ $message }}
                @enderror
            </div>
            <div class="w-full m-3">
                <input class="w-full p-1 border rounded h-10 pl-2" value='{{ $user->file }}' wire:model='file'>
            </div>
            <div class='text-red-600 ml-3'>
                @error('file')
                    {{ $message }}
                @enderror
            </div>
            <div class="w-full m-3">
                <button type='submit' class="w-full rounded bg-blue-500 p-1 h-10 text-white font-bold">Modifier</button>
            </div>
        </form>
    </div>
</div>