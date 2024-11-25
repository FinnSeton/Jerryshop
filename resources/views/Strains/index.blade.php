@extends('layouts.dashboardblueprint')

@push('styles')

@endpush

@section('title')
    Hier staan alle Strains
@endsection

@section('content')
    <div class="container rounded  mx-auto w-1/2 sm bg-gray-800 text-white">

        <div class="m-1 p-0.5">
            @foreach($strains as $strain)
                <div class="p-2 mb-2 bg-gray-600 strain">
                    <p class="font-bold">{{$strain->naam}} - {{$strain->merk}} - {{$strain->soort}} - {{$strain->thc}}% THC - {{$strain->cbd}}% CBD - €{{$strain->prijs}}</p>
                    <form method="POST" action="/strains/delete/{{$strain->id}}">
                        @csrf
                        @method('DELETE')
                        <button method="POST" action="/strains/delete/{{$strain->id}}" type="submit" class="border pr-2 pl-2 rounded border-red-500">Delete</button>
                        <button method="POST" action="/joints/store" type="submit" class="border pr-2 pl-2 rounded border-green-500">Make joint</button>
                    </form>

                    @foreach($strain->joints as $joint)
                        {{$joint->id}} -
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
@endsection
