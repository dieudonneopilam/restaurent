<div class="grid grid-cols-1 gap-2 mt-5 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
    @forelse ($users as $user)
    <div class="relative flex p-2 mt-3 bg-white shadow-md rounded-xl">
        <img class="w-12 h-12 mr-5 rounded-full" src="{{ asset('img/rapport.jpg') }}" alt="">
        <div>
            <h1>Dieudonne Ngwangwa</h1>
            <p>fonction</p>
        </div>
        <span class="absolute top-0 right-0 block mt-5 mr-5 menu-user">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                <path
                    d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
            </svg>
        </span>
        <div class="absolute top-0 right-0 flex-col hidden w-2/5 mt-5 mr-10 bg-white rounded shadow-md menu-edit">
            <a class="block w-full p-1 pl-3 hover:text-blue-500" href="{{ route('user.edit',1) }}">Modifier</a>
            <a class="block w-full p-1 pl-3 hover:text-red-500 hover:transition-colors" href="">Supprimer</a>
        </div>
    </div>
    @empty

    @endforelse
</div>
