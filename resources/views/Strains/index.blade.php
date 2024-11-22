@extends('layouts.dashboardblueprint')

@push('styles')

@endpush

@section('title')
    Strains
@endsection

@section('content')
    <div class="container border-2 rounded border-blue-600 mx-auto sm bg-gray-800 text-white">
        <h1 class="ml-5 text-2xl">Hier staan alle strains</h1>

        <div class="m-1 p-0.5">
            @foreach($strains as $strain)
                <div class="p-2 mb-2 bg-gray-600 strain">
                    <p class="font-bold">{{$strain->naam}} - {{$strain->merk}} - {{$strain->soort}} - {{$strain->thc}}% THC - {{$strain->cbd}}% CBD - €{{$strain->prijs}}</p>
                    <form method="POST" action="/strains/delete/{{$strain->id}}">
                        @csrf
                        @method('DELETE')
                        <button method="POST" action="/strains/delete/{{$strain->id}}" type="submit" class="border pr-2 pl-2 rounded border-red-500">Delete</button>
                    </form>

                    @foreach($strain->joints as $joint)
                        {{$joint->id}} -
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
@endsection
