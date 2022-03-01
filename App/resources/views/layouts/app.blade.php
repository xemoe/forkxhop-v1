<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="stylesheet" href="{{ asset('vendor/coreui/coreui.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        {{ $slot }}

        <script src="{{ asset('vendor/coreui/coreui.bundle.min.js') }}" defer></script>
        <script src="{{ asset('vendor/simplebar/simplebar.min.js') }}" defer></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>
