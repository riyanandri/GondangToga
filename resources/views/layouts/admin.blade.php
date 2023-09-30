<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <x-head />
</head>

<body class="bg-gray-100">
    <x-sidebar />
    <div class="ml-auto mb-6 lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">
        <x-navbar />

        <div class="px-6 pt-6 2xl:container">
            @yield('content')
        </div>
    </div>
    @livewireScripts
</body>

</html>
