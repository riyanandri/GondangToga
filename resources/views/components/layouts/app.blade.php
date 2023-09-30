<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>
        {{ isset($title) ? config('app.name') . ' | ' . $title : ' ' }}
    </title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:400,500,600&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    @stack('style')

    <!-- Scripts -->
    @livewireStyles
    @vite(['resources/css/app.css'])

    {{-- <title>{{ $title ?? 'Page Title' }}</title> --}}
</head>

<body>
    <x-sidebar />
    <div class="ml-auto mb-6 lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">
        <x-navbar />

        <div class="px-6 pt-6 2xl:container">
            {{ $slot }}
        </div>
    </div>
    @livewireScripts
</body>

</html>
