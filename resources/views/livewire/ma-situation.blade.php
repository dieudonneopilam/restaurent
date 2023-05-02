<div x-data="{ jour : true }" class="flex">
    <div class="justify-center hidden w-1/4 h-full md:block md:fixed">
        <img class="object-cover w-32 h-32 mx-auto rounded-full" src="{{ Storage::url(Auth::user()->file) }}" alt="">
        <span class="block text-lg text-center">{{ Auth::user()->name }} {{ Auth::user()->lastname }}</span>
    </div>
    <div class="w-full mx-auto overflow-y-auto border rounded md:w-8/12 md:fixed left-1/4">
        <header class="flex justify-center h-10 bg-yellow-400 shadow">
            <nav class="flex items-center justify-center mx-10 overflow-auto bg-transparent">
                <li class="block mx-1 ">jour</li>
                <li class="block mx-1">semaine</li>
                <li class="block mx-1">mois</li>
                <li class="block mx-1">annee</li>
            </nav>
        </header>
        <div x-show="jour" class="w-full my-5">
            {!! $charts->renderHtml() !!}
        </div>
    </div>
</div>
@section('script')
{!! $charts->renderChartJsLibrary() !!}
{!! $charts->renderJs() !!}
@endsection
