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
                                    <button type="submit" class="border pr-2 pl-2 rounded border-white">Update</button>
                                </form>
                            </div>
                            <p class="font-semibold">{{ $item['name'] }}</p>
                            <p class="text-gray-300">€{{ number_format($item['price'], 2) }}</p>
                            <form action="{{ route('winkelwagen.remove', $item['id']) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="border pr-2 pl-2 rounded border-white">Remove</button>
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
                        <form action="#" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="payment-method" class="block text-gray-300">Select Payment Method:</label>
                                <select name="payment-method" id="payment-method" class="bg-gray-500 text-white border border-gray-400 rounded-md p-2 w-full">
                                    <option value="credit-card">Credit Card</option>
                                    <option value="paypal">PayPal</option>
                                    <option value="bank-transfer">Bank Transfer</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="card-number" class="block text-gray-300">Card Number:</label>
                                <input type="text" id="card-number" name="card-number" placeholder="•••• •••• •••• ••••" class="bg-gray-500 text-white border border-gray-400 rounded-md p-2 w-full">
                            </div>
                            <div class="flex space-x-4 mb-2">
                                <div class="w-1/2 mr-2">
                                    <label for="expiry-date" class="block text-gray-300">Expiry Date:</label>
                                    <input type="text" id="expiry-date" name="expiry-date" placeholder="MM/YY" class="bg-gray-500 text-white border border-gray-400 rounded-md p-2 w-full">
                                </div>
                                <div class="w-1/2">
                                    <label for="cvv" class="block text-gray-300">CVV:</label>
                                    <input type="text" id="cvv" name="cvv" placeholder="•••" class="bg-gray-500 text-white border border-gray-400 rounded-md p-2 w-full">
                                </div>
                            </div>
                            <button class="border pr-2 pl-2 rounded border-white">Proceed to Payment</button>
                        </form>
                    </div>
                </div>

                <div class="bg-gray-700 min-h-[300px] rounded-xl shadow-lg">
                    <div class="bg-gray-800 rounded-t-xl p-4">
                        <p class="font-semibold text-2xl text-white">Total</p>
                    </div>
                    <div id="total" class="p-4 text-lg text-gray-300">
                        <div class="mb-2">
                            <p class="font-semibold">Subtotal:</p>
                            <p>€{{ number_format(array_reduce($cartItems, fn($sum, $item) => $sum + ($item['price'] * $item['quantity']), 0), 2) }}</p>
                        </div>
                        <div class="mb-2">
                            <p class="font-semibold">Shipping:</p>
                            <p>€{{ number_format(5.99, 2) }} (Standard shipping)</p>
                        </div>
                        <div class="mb-2">
                            <p class="font-semibold">Tax (21%):</p>
                            <p>€{{ number_format(array_reduce($cartItems, fn($sum, $item) => $sum + ($item['price'] * $item['quantity']), 0) * 0.21, 2) }}</p>
                        </div>
                        <div class="font-semibold mt-4">
                            <p>Total: €{{ number_format(array_reduce($cartItems, fn($sum, $item) => $sum + ($item['price'] * $item['quantity']), 0) + 5.99 + (array_reduce($cartItems, fn($sum, $item) => $sum + ($item['price'] * $item['quantity']), 0) * 0.21), 2) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
