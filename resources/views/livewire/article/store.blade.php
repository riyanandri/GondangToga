@push('style')
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
@endpush
@section('nav-title')
    Tambah Data Konten
@endsection
<div class="bg-white pb-4 px-4 rounded-md w-full">
    <div class="overflow-x-auto mt-6">
        <form wire:submit.prevent="store" enctype="multipart/form-data">
            <div class="mx-auto max-w-full">
                <div class="grid grid-cols-4 gap-4">
                    <div class="py-1">
                        <span class="px-1 text-md text-gray-600">Nama Tanaman</span>
                        <select wire:model.defer="plant_id"
                            class="text-md mt-2 block px-3 py-2 rounded-lg w-full bg-white border-2 border-gray-300 shadow-md focus:bg-white focus:border-transparent focus:ring-0">
                            <option>Pilih Tanaman</option>
                            @foreach ($plants as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="py-1 col-span-3">
                        <span class="px-1 text-md text-gray-600">Judul Konten</span>
                        <input type="text" wire:model.defer="title"
                            class="text-md mt-2 block px-3 py-2 rounded-lg w-full bg-white border-2 shadow-md focus:bg-white focus:border-transparent focus:ring-0 @if ($errors->has('title')) border-red-400 focus:border-red-500 @else border-gray-300 focus:border-gray-500 @endif">
                        @error('title')
                            <span class="text-red-500 font-medium text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="py-3" wire:ignore>
                    <span class="px-1 text-md text-gray-600">Konten</span>
                    <textarea id="content"></textarea>
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
    <script src="https://code.jquery.com/jquery-3.7.1.slim.js"
        integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
    <script>
        CKEDITOR.replace('content');
        CKEDITOR.instances.content.on('change', function() {
            @this.set('content', this.getData());
        })
    </script>
@endpush
