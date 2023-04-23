<div x-data="{ jour : true }" class="flex">
    <div class="md:fixed justify-center w-1/4 h-full">
        <img class="object-cover w-32 h-32 mx-auto rounded-full" src="{{ Storage::url(Auth::user()->file) }}" alt="">
        <span class="block text-lg text-center">{{ Auth::user()->name }} {{ Auth::user()->lastname }}</span>
    </div>
    <div class="fixed w-8/12 overflow-y-auto border rounded left-1/4">
        <header class="flex justify-center h-10 bg-yellow-400 shadow">
            <nav class="flex items-center justify-center mx-10 bg-transparent">
                <li contextmenu="ok" class="block mx-5 ">jour</li>
                <li x-on:click='jour=false' class="block mx-5">semaine</li>
                <li class="block mx-5">mois</li>
                <li class="block mx-5">annee</li>
            </nav>
        </header>
        <div x-show="jour" class="w-full my-5">
            {!! $chart->renderHtml() !!}
        </div>
    </div>
</div>
@section('script')
{!! $chart->renderChartJsLibrary() !!}
{!! $chart->renderJs() !!}
@endsection
