@push('style')
    <link rel="stylesheet" href="{{ asset('assets/leaflet/leaflet.css') }}" />
@endpush
<div class="grid gap-6 md:grid-cols-1 lg:grid-cols-2">
    <div wire:ignore
        class="h-full space-y-6 group p-6 sm:p-8 rounded-3xl bg-white border border-gray-200/50 bg-opacity-50 shadow-md shadow-gray-600/10">
        <div id="map"></div>
    </div>
    <div
        class="h-full space-y-6 group p-6 sm:p-8 rounded-3xl bg-white border border-gray-200/50 bg-opacity-50 shadow-md shadow-gray-600/10">
        <form wire:submit.prevent="store">
            <div class="mx-auto max-w-full">
                <div class="py-1">
                    <span class="px-1 text-md text-gray-600">Tanaman</span>
                    <select wire:model.defer="plant_id"
                        class="text-md mt-2 block px-3 py-2 rounded-lg w-full bg-white border-2 border-gray-300 shadow-md focus:bg-white focus:border-transparent focus:ring-0">
                        <option>Pilih Tanaman</option>
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
                    </textarea>
                </div>
                <button type="submit"
                    class="mt-3 text-md font-medium bg-gray-600 text-white rounded-lg px-6 py-2 block shadow-xl hover:text-white hover:bg-black">
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
