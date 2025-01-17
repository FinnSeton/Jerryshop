@extends('layouts.dashboardblueprint')

@push('styles')
@endpush

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="container rounded mx-auto w-5/6 m-5 text-white">
        <div class="grid grid-cols-2 grid-rows-1 gap-4 text-white">
            <div class="col-span-1 bg-gray-700 min-h-[300px] rounded-xl shadow-lg">
                <div class="bg-gray-800 rounded-t-xl p-4">
                    <p class="font-semibold text-2xl text-white">Highlighted Item</p>
                </div>
                <div class="text-lg">
                    @foreach($strains as $strain)
                        <div class="p-2 m-2 bg-gray-600">
                            <a href="{{ route('strain.detail', $strain->id) }}" 
                               class="float-right text-2xl text-white py-2 px-4 inline-block">
                               ⓘ
                            </a>
                            <p class="font-semibold ">{{ $strain->naam }}</p>
                            <p class="text-gray-300">Brand : {{ $strain->merk }}</p>
                            <p class="text-gray-300">€{{ $strain->prijs }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-span-1 bg-gray-700 min-h-[300px] rounded-xl shadow-lg">
                <div class="bg-gray-800 rounded-t-xl p-4">
                    <p class="font-semibold text-2xl text-white">Recently Added Products</p>
                </div>
                <div class="text-lg">
                    @foreach($recentProducts as $product)
                        <div class="p-2 m-2 bg-gray-600">
                            <a href="{{ route('strain.detail', $product->id) }}" 
                               class="float-right text-2xl text-white py-2 px-4 inline-block">
                               ⓘ
                            </a>
                            <p class="font-semibold">{{ $product->naam }}</p>
                            <p class="text-gray-300">Brand : {{ $product->merk }}</p>
                            <p class="text-gray-300">€{{ $product->prijs }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
