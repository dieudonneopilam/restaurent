<div class="grid w-10/12 mx-auto bg-white shadow-lg rounded-2xl md:w-3/5 md:grid-cols-2 h-3/4">
    <div class="hidden w-full p-10 md:block h-96">
        <img class="object-cover w-full h-full rounded-tl-2xl rounded-bl-2xl" src="{{ Storage::url($user->file) }}" alt="" srcset="">
    </div>
    <div class="flex flex-col justify-around p-5">
        <form wire:submit.prevent='submit' class="flex flex-col items-start justify-between">
            <div class="w-full m-3">
                <input wire:model='nom'  placeholder='enter le nom' class="w-full h-10 p-1 pl-2 border rounded" value='{{ $user->name }}'  type="text">
            </div>
            <div class='ml-3 text-red-600'>
                @error('nom')
                    {{ $message }}
                @enderror
            </div>
            <div class="w-full m-3">
                <input wire:model='prenom' value='{{ $user->lastname }}' placeholder='enter le prenom' class="w-full h-10 p-1 pl-2 border rounded"  type="text">
            </div>
            <div class='ml-3 text-red-600'>
                @error('prenom')
                    {{ $message }}
                @enderror
            </div>
            <div class="w-full m-3">
                <input wire:model='mail' value='{{ $user->email }}' placeholder='enter le mail' class="w-full h-10 p-1 pl-2 border rounded" type="email">
            </div>
            <div class='ml-3 text-red-600'>
                @error('mail')
                    {{ $message }}
                @enderror
            </div>
            <div class="w-full m-3">
                <select wire:model='fonction' value='{{ $user->is_admin }}' class="w-full h-10 p-1 pl-2 border rounded">
                    <option value="null">select fonction</option>
                    {{-- <option value="serveur">Serveur</option> --}}
                    <option value="admin">admin</option>
                    <option value="comptoire">Comptoire</option>
                </select>
            </div>
            <div class='ml-3 text-red-600'>
                @error('fonction')
                    {{ $message }}
                @enderror
            </div>
            <div class="w-full m-3">
                <input wire:model='password' value='{{ $user->password }}' placeholder='enter le password' class="w-full h-10 p-1 pl-2 border rounded"  type="password">
            </div>
            <div class='ml-3 text-red-600'>
                @error('password')
                    {{ $message }}
                @enderror
            </div>
            <div class="w-full m-3">
                <input wire:model='confirm' value='{{ $user->password }}' placeholder='confirm votre password' class="w-full h-10 p-1 pl-2 border rounded" type="password">
            </div>
            <div class='ml-3 text-red-600'>
                @error('confirm')
                    {{ $message }}
                @enderror
            </div>
            <div class="w-full m-3">
                <input class="w-full h-10 p-1 pl-2 border rounded" value='{{ $user->file }}' wire:model='file'>
            </div>
            <div class='ml-3 text-red-600'>
                @error('file')
                    {{ $message }}
                @enderror
            </div>
            <div class="w-full m-3">
                <button type='submit' class="w-full h-10 p-1 font-bold text-white bg-blue-500 rounded">Modifier</button>
            </div>
        </form>
    </div>
</div>
