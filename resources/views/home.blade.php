@push('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/leaflet/leaflet.css') }}" />
@endpush

<div>
    <div class="relative">
        <img class="absolute inset-0 w-full h-full object-cover object-top" src="{{ asset('assets/img/background.jpg') }}"
            width="400" height="500" alt="hero background image">
        <div aria-hidden="true" class="absolute inset-0 w-full h-full bg-purple-900 bg-opacity-30 backdrop-blur-sm">
        </div>
        <div class="relative container m-auto px-6 md:px-12 lg:px-6">
            <div class="mb-12 pt-40 space-y-16 md:mb-20 md:pt-56 lg:w-8/12 lg:mx-auto">
                <h1 class="text-white text-center text-3xl font-bold sm:text-4xl md:text-5xl">
                    Wujudkan Konservasi Toga Bersama Himafa Unimma
                </h1>

                <form action="" class="w-full">
                    <div class="relative flex p-1 rounded-xl bg-white shadow-2xl md:p-2">
                        <input placeholder="Temukan tanaman yang ingin anda cari di website ini"
                            class="w-full border-transparent focus:border-transparent focus:ring-0 p-4 text-gray-600"
                            type="text" disabled>
                        <a href="{{ route('plants') }}">
                            <button type="button"
                                class="ml-auto py-4 px-6 rounded-lg text-center transition bg-green-500 hover:bg-green-700 active:bg-green-800 focus:bg-green-800 md:px-12">
                                <span class="hidden text-white font-semibold md:block">
                                    Jelajahi
                                </span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 mx-auto text-white md:hidden"
                                    fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path
                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                </svg>
                            </button>
                        </a>
                    </div>
                </form>
            </div>

            <div class="pb-16">
                <div class="md:px-12">
                    <h3 class="text-white text-center text-xl font-bold sm:text-2xl md:text-3xl">
                        Tanaman Obat Desa Growong
                    </h3>
                    <div class="mt-8 -mx-6 px-6 overflow-x-auto md:overflow-x-hidden">
                        <p class="mx-auto text-center text-lg text-gray-200 max-w-screen-xl leading-relaxed">
                            Desa Growong memiliki banyak tanaman obat yang memiliki potensi dari segi kesehatan, ekonomi
                            dan pertanian sehingga memiliki banyak potensi yang dapat dikembangkan. Berdasarkan hal ini,
                            Kelompok Tani dan Kelompok Wanita Tani Desa Growong membuat inovasi produk herbal yang
                            berbahan tanaman obat hasil olahan Desa Growong sendiri.
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="bg-white py-16">
        <div class="container m-auto text-gray-600 md:px-12 xl:px-6">
            <div class="mb-12 space-y-4 px-6 md:px-0">
                <h2 class="text-center text-2xl font-bold text-gray-800 md:text-4xl">
                    Peta Persebaran Tanaman.
                </h2>
                <p class="mx-auto text-center max-w-screen-lg">
                    Desa Growong membudidayakan berbagai macam tanaman obat keluarga yang tersebar di berbagai wilayah
                    desa Growong. Persebaran tanaman obat keluarga dapat dilihat dari peta persebaran tanaman obat
                    keluarga. Peta persebarannya berisi mengenai titik koordinat wilayah budidaya tanaman obat keluarga
                    yang sudah ada.
                </p>
                <div wire:ignore id="map"></div>
            </div>
        </div>
    </div>
</div>

@push('script')
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
            center: [-7.522348405831862, 110.13889859262459],
            zoom: 14,
            layers: [osm]
        })

        var baseMaps = {
            'Open Street Map': osm,
            'Esri Map': Esri_WorldStreetMap
        }

        @foreach ($spots as $spot)
            L.marker([{{ $spot->coordinate }}], {
                icon: markerIcon,
            }).bindPopup(
                "<div class='my-1'><img class='w-16 h-14' src='{{ asset('/storage/plants/' . $spot->plant->image) }}' /></div>" +
                "<div class='my-1'><strong>{{ $spot->plant->name }}</strong></div>" +
                "<div class='my-1'><i>{{ $spot->plant->latin }}</i></div>"
            ).addTo(map);
        @endforeach

        const layerControl = L.control.layers(baseMaps).addTo(map);
    </script>
@endpush
