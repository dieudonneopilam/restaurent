@extends('layouts.app')
@section('main')

<div class="w-11/12 mx-auto md:w-1/2 overflow-x-auto">
    {!! $chart->renderHtml() !!}
</div>
  
@endsection

@section('script')
{!! $chart->renderChartJsLibrary() !!}
{!! $chart->renderJs() !!}
@endsection