<div class="bg-white mt-10 py-20">
    <div class="container m-auto text-gray-600 md:px-12 xl:px-6">
        <div class="mb-12 space-y-4 px-6 md:px-0">
            <h2 class="text-center text-2xl font-bold text-gray-800 md:text-4xl">
                Koleksi Produk.
            </h2>
            <p class="text-center">
                We don't like to brag, but we don't mind letting our customers do it for us. <br />
                Here are a few nice things folks have said about our themes over the years.
            </p>
            <!-- component -->
            <div class="w-full place-items-center overflow-x-scroll rounded-lg p-6 lg:overflow-visible">
                <div class="flex flex-row justify-between">
                    <div class="order-first">
                    </div>
                    <div class="order-last">
                        <input
                            class="border-2 border-gray-300 bg-white h-10 w-60 rounded-lg text-sm focus:border-green-500 focus:ring-0"
                            type="search" wire:model="search" placeholder="Cari Tanaman">
                    </div>
                </div>
            </div>
            <!-- component -->
            <div class="w-full flex place-items-start">
                @foreach ($products as $item)
                    <div class="mx-0.5 max-w-sm w-full p-4 sm:w-1/2">
                        <div class="card flex flex-col justify-center p-8 bg-white rounded-lg shadow-lg">
                            <div class="plant-img">
                                <img src="{{ asset('/storage/products/' . $item->image) }}"
                                    class="w-full max-h-56 object-cover object-center" />
                            </div>
                            <div class="plant-title mt-2">
                                <p class="text-2xl text-gray-900 font-bold">{{ $item->name }}</p>
                                <p class="italic text-sm text-gray-400">
                                    {{ $item->plant->name }}
                                </p>
                            </div>
                            <div class="plant-info mt-3">
                                <div class="flex flex-col md:flex-row justify-between items-center text-gray-900">
                                    <button
                                        class="px-4 py-1 transition ease-in duration-200 rounded-full hover:bg-gray-800 hover:text-white border-2 border-gray-900 focus:outline-none">
                                        Lihat detail
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $products->links() }}
        </div>
    </div>
</div>
