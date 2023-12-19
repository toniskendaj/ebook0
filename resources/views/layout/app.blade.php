<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        <title>{{ config('app.name') }}</title>
    </head>
    <body>
    <x-navbar/>
    <x-navbarpc/>
    @yield('content')
    <x-footer/>
</body>
</html>