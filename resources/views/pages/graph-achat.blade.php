@extends('layouts.app')
@section('main')
    <div class="container w-10/12 mx-auto h-32">
    <div class="bg-bg-yellow-500 h-20 w-full flex justify-content-around align-content-center items-center px-5">
        <a class="block mx-5 text-red-500" href="#">VENTES CASH</a>
        <a class="block mx-5" href="#">VENTES DETTE</a>
        <a class="block mx-5" href="#">ACHATS</a>
        <a class="block mx-5" href="#">DEPENSES</a>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div x-show="chart1" class="card-body">
                    <h1>{{ $chart1->options['chart_title'] }}</h1>
                    {!! $chart1->renderHtml() !!}
                </div>
                <hr />
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
{!! $chart1->renderChartJsLibrary() !!}
{!! $chart1->renderJs() !!}
@endsection