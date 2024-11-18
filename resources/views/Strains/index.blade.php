@extends('layouts.dashboardblueprint')

@push('styles')

@endpush

@section('title')
    Strains
@endsection

@section('content')

    <h1>Hier staan alle strains</h1>


    @foreach($strains as $strain)
        <div class="strain">

            {{$strain->naam}} - {{$strain->merk}} -{{$strain->soort}} - {{$strain->thc}}% THC - {{$strain->cbd}}% CBD  - €{{$strain->prijs}}

        </div>
    @endforeach
@endsection


