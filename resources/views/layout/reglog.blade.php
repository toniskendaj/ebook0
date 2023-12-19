<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        <script src="resouces/js/app.js"></script>
        <title>{{ config('app.name') }}</title>

    </head>
    <body>
    
    @yield('content')
<hr>
<x-footer/>
</body>
</html>
<script src="https//unpkg.com/alpinejs" defer></script>