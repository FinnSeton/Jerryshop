@extends('layouts.dashboardblueprint')

@push('styles')

@endpush

@section('title')
    Strains
@endsection

@section('content')
    <div class="container border-2 rounded border-white mx-auto sm bg-gray-800 text-white" >
        <h1 class="ml-5 text-2xl">Hier staan alle strains</h1>

        <div class="bg-gray-600">
            @foreach($strains as $strain)
                <div class=pl-5 strain">

                    {{$strain->naam}} - {{$strain->merk}} - {{$strain->soort}} - {{$strain->thc}}% THC - {{$strain->cbd}}% CBD  - €{{$strain->prijs}}

                    @foreach($strain->joints as $joint)
                        {{$joint->id}}
                        -
                    @endforeach

                </div>
            @endforeach
        </div>    
    </div>

@endsection


