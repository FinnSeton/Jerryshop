@extends('layouts.dashboardblueprint')

@push('styles')
@endpush

@section('title')
    Winkelwagen
@endsection

@section('content')
    <div class="container rounded mx-auto w-5/6 m-5 text-white">
        <div class="grid grid-cols-2 grid-rows-1 gap-4 text-white">
            <div class="col-span-1 bg-gray-700 min-h-[300px] rounded-xl shadow-lg">
                <div class="bg-gray-800 rounded-t-xl p-4">
                    <p class="font-semibold text-2xl text-white">Huidige items</p>
                </div>
                <div id="items" class="text-lg">

                <!--item code -->

                <!-- <div class="p-2 m-2 bg-gray-600 hover:bg-gray-700">
                    <a href="{{ route('strain.index', $strain->id) }}" class=" float-right mt-3 text-white border-2 rounded border-white hover:bg-white hover:text-black py-2 px-4 inline-block">
                        More Details
                    </a>
                    <p class="font-semibold ">{{ $strain->naam }}</p>
                    <p class="text-gray-300">Brand : {{ $strain->merk }}</p>
                    <p class="text-gray-300">€{{ $strain->prijs }}</p>
                </div> -->





                </div>
            </div>

            <div class="grid grid-rows-2 gap-4 col-span-1">
                <div class="bg-gray-700 min-h-[300px] rounded-xl shadow-lg">
                    <div class="bg-gray-800 rounded-t-xl p-4">
                        <p class="font-semibold text-2xl text-white">Payment</p>
                    </div>
                    <div id="payment" class="p-4 text-lg text-gray-300">



                        
                    </div>
                </div>

                <div class="bg-gray-700 min-h-[300px] rounded-xl shadow-lg">
                    <div class="bg-gray-800 rounded-t-xl p-4">
                        <p class="font-semibold text-2xl text-white">Total</p>
                    </div>
                    <div id="total" class="p-4 text-lg text-gray-300">



                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
