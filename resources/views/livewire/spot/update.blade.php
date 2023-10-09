@push('style')
    <link rel="stylesheet" href="{{ asset('assets/leaflet/leaflet.css') }}" />
@endpush
@section('nav-title')
    Edit Data Lokasi
@endsection
<div class="grid gap-6 md:grid-cols-1 lg:grid-cols-2">
    <div wire:ignore
        class="h-full space-y-6 group p-6 sm:p-8 rounded-3xl bg-white border border-gray-200/50 bg-opacity-50 shadow-md shadow-gray-600/10">
        <div id="map"></div>
    </div>
    <div
        class="h-full space-y-6 group p-6 sm:p-8 rounded-3xl bg-white border border-gray-200/50 bg-opacity-50 shadow-md shadow-gray-600/10">
        <form wire:submit.prevent="update">
            <div class="mx-auto max-w-full">
                <div class="py-1">
                    <span class="px-1 text-md text-gray-600">Tanaman</span>
                    <select wire:model.defer="plant_id"
                        class="text-md mt-2 block px-3 py-2 rounded-lg w-full bg-white border-2 border-gray-300 shadow-md focus:bg-white focus:border-transparent focus:ring-0">
                        @foreach ($plants as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="py-3">
                    <span class="px-1 text-md text-gray-600">Koordinat</span>
                    <input type="text" name="coordinate" id="coordinate" wire:model.defer="coordinate"
                        class="text-md mt-2 block px-3 py-2 rounded-lg w-full bg-white border-2 shadow-md focus:bg-white focus:border-transparent focus:ring-0 @if ($errors->has('coordinate')) border-red-400 focus:border-red-500 @else border-gray-300 focus:border-gray-500 @endif">
                    @error('coordinate')
                        <span class="text-red-500 font-medium text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="py-1">
                    <span class="px-1 text-md text-gray-600">Deskripsi Lokasi</span>
                    <textarea wire:model.defer="description"
                        class="text-md mt-2 block px-3 py-2 rounded-lg w-full bg-white border-2 shadow-md border-gray-300 focus:border-gray-500 focus:bg-white focus:border-transparent focus:ring-0">
                        {{ $description }}
                    </textarea>
                </div>
                <button type="submit"
                    class="mt-5 text-md font-medium bg-gray-600 text-white rounded-lg px-6 py-2 block shadow-xl hover:text-white hover:bg-black">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@push('script')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/leaflet/leaflet.js') }}"></script>
    <script>
        var osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        });

        var Stadia_Dark = L.tileLayer(
            'https://tiles.stadiamaps.com/tiles/alidade_smooth_dark/{z}/{x}/{y}{r}.{ext}', {
                minZoom: 0,
                maxZoom: 20,
                attribution: '&copy; <a href="https://www.stadiamaps.com/" target="_blank">Stadia Maps</a> &copy; <a href="https://openmaptiles.org/" target="_blank">OpenMapTiles</a> &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
                ext: 'png'
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
            zoom: 17,
            layers: [osm]
        })

        var baseMaps = {
            'Open Street Map': osm,
            'Stadia Dark': Stadia_Dark,
            'Esri Map': Esri_WorldStreetMap
        }

        const layerControl = L.control.layers(baseMaps).addTo(map);

        var marker = L.marker([-7.522145593857628, 110.13850691328653], {
            icon: markerIcon,
            draggable: true
        }).addTo(map);


        // cara pertama mendapatkan koordinat
        function onMapClick(e) {
            var coordinate = document.querySelector("[name=coordinate]")
            var lat = e.latlng.lat
            var lng = e.latlng.lng

            if (!marker) {
                marker = L.marker(e.latlng).addTo(map)
            } else {
                marker.setLatLng(e.latlng)
            }

            @this.set('coordinate', coordinate.value = lat + "," + lng)
        }

        map.on('click', onMapClick)

        // cara kedua mendapatkan koordinat
        marker.on('dragend', function() {
            var coordinate = marker.getLatLng();
            marker.setLatLng(coordinate, {
                draggable: true
            })
            $('#coordinate').val(@this.set('coordinate', coordinate.lat + "," + coordinate.lng)).keyup()
        })
    </script>
@endpush
