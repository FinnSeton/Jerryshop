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
                <p class="font-bold">{{$strain->naam}} - {{$strain->merk}} - {{$strain->soort}} - {{$strain->thc}}% THC -
                    {{$strain->cbd}}% CBD - €{{$strain->prijs}}</p>
                <form method="POST" action="/strains/delete/{{$strain->id}}">
                    @csrf
                    @method('DELETE')
                    <button method="POST" action="/strains/delete/{{$strain->id}}" type="submit"
                        class="border pr-2 pl-2 rounded border-red-500">Delete</button>
                </form>
                <form class="mt-5 flex flex-col container mx-auto sm" action='/joints/store' method='POST'>
                    @csrf
                    <label class="text-white" for='strain_id''>Vul strain id in</label>
                                    <input type=' text' name='strain_id'>
                        @error('strain_id')
                            <p class="text-red">Er is een error in de strains: {{$errors}}</p>
                        @enderror

                        <label class="text-white" for="prijs">Vul het prijs in van de zaza</label>
                        <input type="text" name="prijs">
                        @error('prijs')
                            <p class="text-red">Er is een error in de merken.</p>
                        @enderror

                        <input
                            class="mt-5 text-white border-2 rounded border-white hover:border-black hover:bg-white hover:text-black"
                            type='submit'>
                </form>
            </div>
                @foreach($strain->joints as $joint)
                    <div class="p-2 ml-15 mb-2 bg-gray-600 strain">
                        <p class="font-bold">{{$joint->strain_id}} id - {{$joint->prijs}} prijs</p>

                    </div>

                @endforeach
        @endforeach
    </div>
</div>
@endsection