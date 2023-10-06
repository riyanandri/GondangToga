<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:400,500,600&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/leaflet/leaflet.css') }}" />
    <style>
        #map {
            height: 30vw;
        }
    </style>
</head>
<!-- Scripts -->
@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">

    @include('components.nav')

    @yield('content')

    @include('components.footer')
    <script>
        window.addEventListener('scroll', e => {
            const header = document.querySelector('#header_')
            e.preventDefault()
            header.classList.toggle('sticky-nav', window.scrollY > 0);
        })

        const toggleMobileMenu = document.querySelector('#hamburger')
        const navbar = document.querySelector('#navbar')

        toggleMobileMenu.addEventListener('click', e => {
            e.preventDefault()
            toggleMobileMenu.querySelector('#line').classList.toggle('rotate-45')
            toggleMobileMenu.querySelector('#line').classList.toggle('translate-y-1.5')

            toggleMobileMenu.querySelector('#line2').classList.toggle('-rotate-45')
            toggleMobileMenu.querySelector('#line2').classList.toggle('-translate-y-1')
            if (navbar.clientHeight === 0) {
                navbar.style.paddingTop = '20px'
                navbar.style.paddingBottom = '20px'
                navbar.style.height = `${parseInt(navbar.scrollHeight) + 60}px`
                return
            }
            navbar.style.height = '0px'
            navbar.style.paddingTop = '0px'
            navbar.style.paddingBottom = '0px'
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="{{ asset('assets/leaflet/leaflet.js') }}"></script>
    <script>
        const map = L.map('map').setView([-7.477508796537083, 110.24344403496698], 11);

        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        var markerIcon = L.icon({
            iconUrl: '{{ asset('assets/leaflet/images/marker.png') }}',
            iconSize: [50, 50]
        });

        var marker = L.marker([-7.477508796537083, 110.24344403496698], {
            icon: markerIcon,
            draggable: true
        }).bindPopup('Lokasi').addTo(map);
    </script>
</body>

</html>
