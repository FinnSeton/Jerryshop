<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    @stack('styles')

</head>

<body>
<header>
    <nav>
        <x-app-layout>
            <x-slot name="header">
                <h1 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
                    @yield('title')
                </h1>
            </x-slot>
        </x-app-layout>
    </nav>
</header>

<main>
    <section class="product-details">
{{--        <div class="product-image">--}}
{{--            <img src="@yield('product_image')" alt="@yield('title')" class="w-full h-auto">--}}
{{--        </div>--}}
        <div class="product-info">
            <h2 class="text-lg font-bold text-gray-800 dark:text-gray-200">@yield('product_name')</h2>
            <p class="text-gray-600 dark:text-gray-400">@yield('product_description')</p>
            <div class="product-price">
                <span class="text-xl font-bold text-green-600">@yield('product_price')</span>
            </div>
            <div class="product-actions">
                <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    @yield('button_text', 'Toevoegen aan winkelwagen')
                </button>
            </div>
        </div>
    </section>
</main>

@stack('scripts')
</body>
</html>
