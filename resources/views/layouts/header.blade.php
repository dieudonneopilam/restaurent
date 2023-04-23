<header
    class="fixed top-0 left-0 right-0 z-10 flex items-center justify-between h-20 px-5 bg-blue-400 shadow lg::px-40 border-b-gray-500 border-dark sm:px-20 ">
    <div class="flex items-center">
        @if (Auth::user()->file > 1)
        <img class="object-cover w-12 h-12 rounded-full" src="{{ Storage::url(Auth::user()->file) }}" alt=""
        srcset="">
        @else
        <img class="object-cover w-12 h-12 rounded-full" src="{{ asset('img/logoa.png') }}" alt=""
        srcset="">
        @endif
        <h1 class="mx-5 text-lg text-white">{{ Auth::user()->name }}</h1>

    </div>

    <div class="flex items-center">


        <a href="{{ route('logout') }}" class="flex items-center ml-5 text-white">
            <span class="mr-1">Logout</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                class="bi bi-arrow-right-square-fill" viewBox="0 0 16 16">
                <path
                    d="M0 14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v12zm4.5-6.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5a.5.5 0 0 1 0-1z" />
            </svg>
        </a>
    </div>
</header>
