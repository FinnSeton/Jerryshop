<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    @stack('styles')

</head>

<body>
    <nav>
        <x-app-layout>
            <x-slot name="header">
                <h1 class="text-2xl font-semibold text-white">
                    @yield('strainname')
                </h1>

                <p class="text-white">
                    @yield('brand')
                </p>
            </x-slot>


            <div class="container rounded mx-auto w-5/6 m-5 text-white">
                <div class="grid grid-cols-2 grid-rows-1 gap-4 text-white">
                    <div class="col-span-1 bg-gray-700 min-h-[200px] max-h-[700px] rounded-xl shadow-lg">
                        <!-- image -->
                        <img src="{{ asset('img/strain-placeholeder.png') }}" alt="Strain Placeholder" class="w-full h-full object-cover object-scale-down rounded-xl">
                    </div>

                    <div class="col-span-1 min-h-[200px] max-h-[700px] rounded-xl shadow-lg">
                        <div class="bg-gray-800 rounded-t-xl p-4">
                            <p class="font-semibold text-2xl text-white">@yield('strainname')</p>
                        </div>
                        <div class="bg-gray-700 p-4">
                            <p class="font-semibold text-2xl text-white"> @yield('brand')</p>
                        </div>
                        <div class="bg-gray-800 p-4">
                            <p class="font-semibold text-2xl text-white">€@yield('price')</p>
                        </div>
                        <div class="bg-gray-700 p-4">
                            <p class="font-semibold text-2xl text-white">@yield('type')</p>
                        </div>
                        <div class="bg-gray-800 p-4">
                            <p class="font-semibold text-2xl text-white">THC @yield('thc')%</p>
                        </div>
                        <div class="bg-gray-700 p-4">
                            <p class="font-semibold text-2xl text-white">CBD @yield('cbd')%</p>
                        </div>
                        <div class="bg-gray-800 p-6">
                            <button type="addcart" class="border pr-2 pl-2 mr-2 rounded border-white text-xl font-semibold hover:bg-gray-700">Toevoegen aan winkelwagen</button>
                            
                        </div>
                        
                    </div>

                </div>
            </div>

        </x-app-layout>
    </nav>
</body>

@stack('scripts')

</html>
