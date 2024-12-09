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
                        <div class="p-2 m-2 bg-gray-600 hover:bg-gray-700">
                            <a href="{{ route('strain.index', $strain->id) }}" 
                               class=" float-right mt-3 text-white border-2 rounded border-white hover:bg-white hover:text-black py-2 px-4 inline-block">
                                More Details
                            </a>
                            <p class="font-semibold ">{{ $strain->naam }}</p>
                            <p class="text-gray-300">Brand : {{ $strain->merk }}</p>
                            <p class="text-gray-300">€{{ $strain->prijs }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="grid grid-rows-2 gap-4 col-span-1">
                <div class="bg-gray-700 min-h-[300px] rounded-xl shadow-lg">
                    <div class="bg-gray-800 rounded-t-xl p-4">
                        <p class="font-semibold text-2xl text-white">Right Div 1</p>
                    </div>
                    <div class="p-4 text-lg text-gray-300">
                        <p>Content for the first right-side div.</p>
                    </div>
                </div>

                <div class="bg-gray-700 min-h-[300px] rounded-xl shadow-lg">
                    <div class="bg-gray-800 rounded-t-xl p-4">
                        <p class="font-semibold text-2xl text-white">Right Div 2</p>
                    </div>
                    <div class="p-4 text-lg text-gray-300">
                        <p>Content for the second right-side div.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
