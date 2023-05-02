<div class="grid grid-cols-1 gap-2 mt-5 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
    @forelse ($users as $user)
    @if (!$user->deleted)
        <div class="relative flex p-2 mt-3 bg-white shadow-md rounded-xl">
        @if (Auth::user()->file)
        <img class="object-cover w-12 h-12 mr-5 rounded-full" src="{{ Storage::url($user->file) }}" alt="">
        @else
        <img class="object-cover w-12 h-12 mr-5 rounded-full" src="{{ asset('img/logoa.png') }}" alt="">
        @endif
        <div>
            <h1>{{ $user->name }} {{ $user->lastname }}</h1>
            <p>
                @if ($user->is_admin)
                    <p>administrateur</p>
                @elseif ($user->is_server)
                    <p>Serveur</p>
                @elseif ($user->is_comptoire)
                    <p>comptoire</p>
                @endif
            </p>
        </div>
        <span class="absolute top-0 right-0 block mt-5 mr-5 menu-user">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                <path
                    d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
            </svg>
        </span>
        <div class="absolute top-0 right-0 flex-col hidden w-2/5 mt-5 mr-10 bg-white rounded shadow-md menu-edit">
            <a class="block w-full p-1 pl-3 hover:text-blue-500" href="{{ route('user.edit',$user->id) }}">Modifier</a>
            <a class="block w-full p-1 pl-3 hover:text-red-500 hover:transition-colors" href='#' wire:click='delete({{ $user->id }})' >Supprimer</a>
        </div>
    </div>
    @endif
    @empty
    <h1>Aucun Agent enregistré</h1>
    @endforelse
</div>
