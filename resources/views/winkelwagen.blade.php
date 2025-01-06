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
                    @foreach($cartItems as $item)
                        <div class="p-2 m-2 bg-gray-600">
                            <div class="float-right">
                                <form action="{{ route('winkelwagen.update', $item['id']) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <label for="quantity" class="text-gray-300">Quantity:</label>
                                    <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="bg-gray-500 text-white border border-gray-400 rounded-md p-1 ml-2 w-12">
                                    <button type="submit" class="ml-2 bg-green-500 text-white p-1 rounded">Update</button>
                                </form>
                            </div>
                            <p class="font-semibold">{{ $item['name'] }}</p>
                            <p class="text-gray-300">€{{ number_format($item['price'], 2) }}</p>
                            <form action="{{ route('winkelwagen.remove', $item['id']) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white p-2 rounded mt-2">Remove</button>
                            </form>
                        </div>
                    @endforeach
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

                        <div id="total" class="p-4 text-lg text-gray-300">
                            <p class="font-semibold">Total: €{{ number_format(array_reduce($cartItems, fn($sum, $item) => $sum + ($item['price'] * $item['quantity']), 0), 2) }}</p>
                        </div>






                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
