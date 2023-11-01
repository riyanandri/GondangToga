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
            height: 25vw;
        }
    </style>
    @livewireStyles
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">

    @include('components.nav')

    <main>
        <div>
            <div class="relative">
                <img class="absolute inset-0 w-full h-full object-cover object-top"
                    src="{{ asset('/storage/backgrounds/' . $plant->hero) }}" width="400" height="500"
                    alt="hero background image">
                <div aria-hidden="true" class="absolute inset-0 w-full h-full bg-purple-900 bg-opacity-30">
                </div>
                <div class="relative container m-auto px-6 md:px-12 lg:px-6">
                    <div class="mb-12 pt-40 space-y-16 md:mb-20 md:pt-56 lg:w-8/12 lg:mx-auto">
                        <div class="card flex flex-col p-2 bg-tranparent rounded-lg shadow-lg mt-36">
                            <div class="plant-img">
                                <img src="{{ asset('/storage/plants/' . $plant->image) }}"
                                    class="max-h-56 max-w-56 object-cover object-center" />
                            </div>
                            <div class="plant-title mt-4 mb-4">
                                <p class="text-4xl text-white font-bold">{{ $plant->name }} <button
                                        class="px-3 py-1 rounded-full bg-gray-800 text-white text-base border-1 border-gray-900 outline-none">
                                        {{ $plant->category->name }}
                                    </button></p>
                                <p class="italic text-2xl text-white mt-3">
                                    {{ $plant->latin }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="bg-white">
                <div class="container m-auto text-gray-600 md:px-12 xl:px-6">
                    <div class="mb-12 space-y-4 px-6 md:px-0">
                        <div class="ml-64 mr-64 text-lg">
                            {!! $plant->content !!}
                            <p class="mt-6 font-bold">Lokasi Tanaman</p>
                            <div class="mt-3" wire:ignore id="map"></div>
                            <p class="mt-6 font-bold">Produk Terkait</p>
                            <div class="mt-3 w-full grid grid-cols-4 gap-3 place-items-start">
                                @forelse ($products as $item)
                                    <div class="card flex flex-col justify-center p-5 bg-white rounded-lg shadow-lg">
                                        <div class="plant-img">
                                            <img src="{{ asset('/storage/products/' . $item->image) }}"
                                                class="h-50 w-50 object-cover object-center" />
                                        </div>
                                        <div class="plant-title mt-2">
                                            <p class="text-base text-gray-900 font-bold">{{ $item->name }}</p>
                                            <p class="italic text-xs text-gray-400">
                                                {{ $item->plant->name }}
                                            </p>
                                        </div>
                                        <div class="plant-info mt-3">
                                            <div
                                                class="flex flex-col md:flex-row justify-between items-center text-gray-900">
                                                <a href="{{ $item->link }}">
                                                    <button
                                                        class="px-3 py-1 text-sm transition ease-in duration-200 rounded-full hover:bg-gray-800 hover:text-white border-2 border-gray-900 focus:outline-none">
                                                        Link Toko
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <p>Produk belum tersedia</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

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
        var osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        });

        var Esri_WorldStreetMap = L.tileLayer(
            'https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}', {
                attribution: 'Tiles &copy; Esri &mdash; Source: Esri, DeLorme, NAVTEQ, USGS, Intermap, iPC, NRCAN, Esri Japan, METI, Esri China (Hong Kong), Esri (Thailand), TomTom, 2012'
            });

        var markerIcon = L.icon({
            iconUrl: '{{ asset('assets/leaflet/images/marker.png') }}',
            iconSize: [25, 40]
        });

        var map = L.map('map', {
            center: [{{ $spots->coordinate }}],
            zoom: 17,
            layers: [osm],
            fullscreenControl: {
                pseudoFullscreen: false
            }
        })

        var baseMaps = {
            'Open Street Map': osm,
            'Esri Map': Esri_WorldStreetMap
        }

        const layerControl = L.control.layers(baseMaps).addTo(map);

        var curLocation = [{{ $spots->coordinate }}];
        var marker = new L.marker(curLocation, {
            draggable: false,
            icon: markerIcon
        });

        map.addLayer(marker);
    </script>
    @livewireScripts
</body>

</html>
