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
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    @yield('title')

                </h2>
            </x-slot>
            @yield('content')
        </x-app-layout>

    </nav>


</body>




@stack('scripts')
</body>
</html>
