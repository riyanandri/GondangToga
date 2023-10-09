@section('nav-title')
    Edit Data Tanaman
@endsection
<div class="bg-white pb-4 px-4 rounded-md w-full">
    <div class="overflow-x-auto mt-6">
        <form wire:submit.prevent="update" enctype="multipart/form-data">
            <div class="mx-auto max-w-4xl">
                <div class="grid grid-cols-2 gap-4">
                    <div class="py-1">
                        <span class="px-1 text-md text-gray-600">Kategori</span>
                        <select wire:model.defer="category_id"
                            class="text-md mt-2 block px-3 py-2 rounded-lg w-full bg-white border-2 border-gray-300 shadow-md focus:bg-white focus:border-transparent focus:ring-0">
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="py-1">
                        <span class="px-1 text-md text-gray-600">Nama Tanaman</span>
                        <input type="text" wire:model.defer="name"
                            class="text-md mt-2 block px-3 py-2 rounded-lg w-full bg-white border-2 shadow-md focus:bg-white focus:border-transparent focus:ring-0 @if ($errors->has('name')) border-red-400 focus:border-red-500 @else border-gray-300 focus:border-gray-500 @endif">
                        @error('name')
                            <span class="text-red-500 font-medium text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="py-2">
                        <span class="px-1 text-md text-gray-600">Nama Latin</span>
                        <input type="text" wire:model.defer="latin"
                            class="text-md mt-2 block px-3 py-2 rounded-lg w-full bg-white border-2 shadow-md focus:bg-white focus:border-transparent focus:ring-0 @if ($errors->has('latin')) border-red-400 focus:border-red-500 @else border-gray-300 focus:border-gray-500 @endif">
                        @error('latin')
                            <span class="text-red-500 font-medium text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="py-2">
                        <span class="px-1 text-md text-gray-600">Keterangan</span>
                        <input type="text" wire:model.defer="information"
                            class="text-md mt-2 block px-3 py-2 rounded-lg w-full bg-white border-2 shadow-md focus:bg-white focus:border-transparent focus:ring-0 @if ($errors->has('information')) border-red-400 focus:border-red-500 @else border-gray-300 focus:border-gray-500 @endif">
                        @error('information')
                            <span class="text-red-500 font-medium text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="py-2">
                        <span class="px-1 text-md text-gray-600">Gambar</span>
                        <input type="file" wire:model.defer="image"
                            class="text-md mt-2 block px-3 py-1.5 rounded-lg w-full bg-white border-2 shadow-md focus:bg-white focus:border-transparent focus:ring-0 @if ($errors->has('image')) border-red-400 focus:border-red-500 @else border-gray-300 focus:border-gray-500 @endif">
                        @error('image')
                            <span class="text-red-500 font-medium text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="py-2">
                        <span class="px-1 text-md text-gray-600">Background</span>
                        <input type="file" wire:model.defer="hero"
                            class="text-md mt-2 block px-3 py-1.5 rounded-lg w-full bg-white border-2 shadow-md focus:bg-white focus:border-transparent focus:ring-0 @if ($errors->has('hero')) border-red-400 focus:border-red-500 @else border-gray-300 focus:border-gray-500 @endif">
                        @error('hero')
                            <span class="text-red-500 font-medium text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <button type="submit"
                    class="mt-5 text-md font-medium bg-gray-600 text-white rounded-lg px-6 py-2 block shadow-xl hover:text-white hover:bg-black">
                    Perbarui
                </button>
            </div>
        </form>
    </div>
</div>
