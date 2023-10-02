<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
        @stack('styles')
        @push('styles')
             <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
        @endpush
    </head>
    <body class="">
        <div class=" relative h-full w-full bg-no-repeat bg-center bg-fixed bg-cover" style="background-image: url('/images/pcc.webp');">
            <div class="bg-black w-full h-full lg:bg-opacity-60">
                <nav class="px-12 py-5 md:flex md:justify-around ">
                    <img src={{"/images/CCD-LogoV3.svg"}}  alt="Logo" class="h-12"/>
                    <img src={{"/images/Apoyo_Alto_Impacto_1.webp"}} alt="Logo fondo" class="h-12"/>
                </nav>

                <div class="flex justify-center mt-10">
                    {{ $slot }}
                </div>
            </div>
        </div>
        @livewireScripts
    </body>
</html>
