<div class="bg-white mt-10 py-20">
    <div class="container m-auto text-gray-600 md:px-12 xl:px-6">
        <div class="mb-12 space-y-4 px-6 md:px-0">
            <h2 class="text-center text-2xl font-bold text-gray-800 md:text-4xl">
                Koleksi Tanaman.
            </h2>
            <p class="text-center">
                We don't like to brag, but we don't mind letting our customers do it for us. <br />
                Here are a few nice things folks have said about our themes over the years.
            </p>
            <!-- component -->
            <div class="w-full place-items-center overflow-x-scroll rounded-lg p-6 lg:overflow-visible">
                <div class="flex flex-row justify-between">
                    <div class="order-first">
                        {{-- <button
                                class="middle none center mr-4 rounded-lg bg-green-500 py-3 px-6 font-sans text-sm font-bold text-white shadow-md shadow-green-500/20 transition-all hover:shadow-lg hover:shadow-green-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                data-ripple-light="true">
                                Semua
                            </button>
                            @foreach ($categories as $item)
                                <button
                                    class="middle none center mr-4 rounded-lg bg-green-500 py-3 px-6 font-sans text-sm font-bold text-white shadow-md shadow-green-500/20 transition-all hover:shadow-lg hover:shadow-green-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                    data-ripple-light="true">
                                    {{ $item->name }}
                                </button>
                            @endforeach --}}
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
                @foreach ($plants as $item)
                    <div class="mx-0.5 max-w-sm w-full p-4 sm:w-1/2">
                        <div class="card flex flex-col justify-center p-8 bg-white rounded-lg shadow-lg">
                            <div class="plant-img">
                                <img src="{{ asset('/storage/plants/' . $item->image) }}"
                                    class="w-full max-h-56 object-cover object-center" />
                            </div>
                            <div class="plant-title mt-2">
                                <p class="text-2xl text-gray-900 font-bold">{{ $item->name }}</p>
                                <p class="italic text-sm text-gray-400">
                                    {{ $item->latin }}
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
            {{ $plants->links() }}
        </div>
    </div>
</div>
