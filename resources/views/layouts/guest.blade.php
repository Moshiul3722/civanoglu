<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <script src="https://kit.fontawesome.com/d5469f0cd1.js" crossorigin="anonymous"></script>

        <!-- Fonts -->

        @if (!request()->is('/'))
            <style>
                #header_area a {
                    color: #000
                }

                #header_area a:hover {
                    color: #991b1b
                }
            </style>
        @endif

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased bg-gray-100 min-h-screen">
            @include('components.header')
            {{ $slot }}
            @include('components.footer')
        </div>
    </body>
</html>
