<!DOCTYPE html>
<html class="h-full" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ToDo</title>
    @stack('scripts')
    @stack('stylesheets')
    {{-- <link rel="stylesheet" href="{{ asset('resources/css/choices.css') }}"> --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    {{-- <title>{{ $title ?? config('app.name') }}</title> --}}
    {{-- @vite(['resources/css/choices.css', 'resources/js/app.js']) --}}
    @vite(['resources/css/app.css', 'resources/css/choices.css', 'resources/js/app.js'])

</head>

<body class="h-full">
    <x-layouts.navbar>{{ $slot }}</x-layouts.navbar>

</body>

</html>
