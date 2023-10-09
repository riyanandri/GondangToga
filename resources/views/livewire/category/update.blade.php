@section('nav-title')
    Edit Data Kategori
@endsection
<div class="bg-white pb-4 px-4 rounded-md w-full">
    <div class="overflow-x-auto mt-6">
        <form wire:submit.prevent="update" enctype="multipart/form-data">
            <div class="mx-auto max-w-lg">
                <div class="py-1">
                    <span class="px-1 text-md text-gray-600">Nama Kategori</span>
                    <input type="text" wire:model.defer="name"
                        class="text-md mt-2 block px-3 py-2 rounded-lg w-full bg-white border-2 shadow-md focus:bg-white focus:border-transparent focus:ring-0 @if ($errors->has('name')) border-red-400 focus:border-red-500 @else border-gray-300 focus:border-gray-500 @endif">
                    @error('name')
                        <span class="text-red-500 font-medium text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="py-3">
                    <span class="px-1 text-md text-gray-600">Gambar</span>
                    <input type="file" wire:model.defer="image"
                        class="text-md mt-2 block px-3 py-1.5 rounded-lg w-full bg-white border-2 shadow-md focus:bg-white focus:border-transparent focus:ring-0 @if ($errors->has('image')) border-red-400 focus:border-red-500 @else border-gray-300 focus:border-gray-500 @endif">
                    @error('image')
                        <span class="text-red-500 font-medium text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="py-1">
                    <span class="px-1 text-md text-gray-600">Deskripsi Singkat</span>
                    <textarea wire:model.defer="short_description"
                        class="text-md mt-2 block px-3 py-2 rounded-lg w-full bg-white border-2 shadow-md focus:bg-white focus:border-transparent focus:ring-0 @if ($errors->has('short_description')) border-red-400 focus:border-red-500 @else border-gray-300 focus:border-gray-500 @endif">
                    </textarea>
                    @error('short_description')
                        <span class="text-red-500 font-medium text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit"
                    class="mt-5 text-md font-medium bg-gray-600 text-white rounded-lg px-6 py-2 block shadow-xl hover:text-white hover:bg-black">
                    Perbarui
                </button>
            </div>
        </form>
    </div>
</div>
