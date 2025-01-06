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

                        <div class="bg-gray-800 flex rounded-t-xl p-4">
                            <p class=" text-xl text-white">€@yield('price'),-</p>
                            <p class="text-sm self-center pl-2">Per Gram</p>
                        </div>
                        <div class="bg-gray-700 p-4">
                            <p class=" text-xl text-white">@yield('type')</p>
                        </div>
                        <div class="bg-gray-800 p-4">
                            <p class=" text-l text-white">THC @yield('thc')%</p>
                        </div>
                        <div class="bg-gray-700 p-4">
                            <p class=" text-l text-white">CBD @yield('cbd')%</p>
                        </div>
                        <div class="bg-gray-800 p-6">

                            @if($foundstrain)
                                <form action="{{ route('winkelwagen.add') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $foundstrain->id }}">
                                    <input type="hidden" name="name" value="{{ $foundstrain->naam }}">
                                    <input type="hidden" name="price" value="{{ $foundstrain->prijs }}">
                                    <input type="hidden" name="type" value="{{ $foundstrain->soort }}">
                                    <input type="hidden" name="thc" value="{{ $foundstrain->thc }}">
                                    <input type="hidden" name="cbd" value="{{ $foundstrain->cbd }}">
                                    <button type="submit" class="border pr-2 pl-2 mr-2 rounded border-white text-xl font-semibold hover:bg-gray-700">
                                        Toevoegen aan winkelwagen
                                    </button>
                                </form>
                            @endif
                        </div>


                    </div>

                </div>
            </div>

        </x-app-layout>
    </nav>
</body>

@stack('scripts')

</html>
