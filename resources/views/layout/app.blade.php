<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('build/assets/app-GCesuJSx.css') }}">
    @stack('styles')
</head>
<body>
    @yield('contenido')
    @stack('scripts')
</body>
</html>
