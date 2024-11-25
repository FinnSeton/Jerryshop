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
    <ul>
        <li><a href="{{route("strains.all")}}">Strains</a> </li>
    </ul>
</nav>

@yield('content')




@stack('scripts')
</body>
</html>
