@section('nav-title')
    Data Tanaman
@endsection
<div>
    <!-- component -->
    <div class="bg-white pb-4 px-4 rounded-md w-full">
        <div class="flex justify-between w-full pt-6 ">
            @if (session()->has('message'))
                <div class="flex bg-green-100 rounded-lg p-4 mb-4 text-sm text-green-700" role="alert">
                    <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <div>
                        <span class="font-medium">Sukses!</span> {{ session('message') }}
                    </div>
                </div>
            @endif
        </div>
        <div class="w-full flex justify-between px-2 mt-2">
            <a href="/admin/plants/create" wire:navigate
                class="bg-gray-600 hover:bg-black text-white font-light py-1 px-4 rounded">
                Tambah Tanaman
            </a>
            <div class="w-full sm:w-64 inline-block relative ">
                <input type="search" wire:model="search"
                    class="border border-gray-300 block w-full appearance-none focus:border-gray-600 focus:ring-0 bg-gray-100 text-sm text-gray-600 py-1 px-4 pl-8 rounded-lg"
                    placeholder="Cari data" />

                <div class="pointer-events-none absolute pl-3 inset-y-0 left-0 flex items-center px-2 text-gray-300">

                    <svg class="fill-current h-3 w-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 511.999 511.999">
                        <path
                            d="M508.874 478.708L360.142 329.976c28.21-34.827 45.191-79.103 45.191-127.309C405.333 90.917 314.416 0 202.666 0S0 90.917 0 202.667s90.917 202.667 202.667 202.667c48.206 0 92.482-16.982 127.309-45.191l148.732 148.732c4.167 4.165 10.919 4.165 15.086 0l15.081-15.082c4.165-4.166 4.165-10.92-.001-15.085zM202.667 362.667c-88.229 0-160-71.771-160-160s71.771-160 160-160 160 71.771 160 160-71.771 160-160 160z" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="overflow-x-auto mt-6">
            <table class="table-auto border-collapse w-full">
                <thead>
                    <tr class="rounded-lg text-sm font-medium text-gray-700 text-left" style="font-size: 0.9674rem">
                        <th class="px-4 py-2 " style="background-color:#f8f8f8">Nama Tanaman</th>
                        <th class="px-4 py-2 " style="background-color:#f8f8f8">Nama Latin</th>
                        <th class="px-4 py-2 " style="background-color:#f8f8f8">Kategori</th>
                        <th class="px-4 py-2 " style="background-color:#f8f8f8">Gambar</th>
                        <th class="px-4 py-2 " style="background-color:#f8f8f8">Keterangan</th>
                        <th class="px-4 py-2 " style="background-color:#f8f8f8"></th>
                    </tr>
                </thead>
                <tbody class="text-sm font-normal text-gray-700">
                    @forelse ($plants as $item)
                        <tr class="hover:bg-gray-100 border-b border-gray-200 py-10">
                            <td class="px-4 py-4">{{ $item->name }}</td>
                            <td class="px-4 py-4 italic">{{ $item->latin }}</td>
                            <td class="px-4 py-4">{{ $item->category->name }}</td>
                            <td class="px-4 py-1">
                                <img class="h-16 object-cover object-center"
                                    src="{{ asset('/storage/plants/' . $item->image) }}" alt="" />
                            </td>
                            <td class="px-4 py-4">{{ $item->information }}</td>
                            <td class="px-4 py-4">
                                <a href="/admin/plants/{{ $item->id }}/edit" wire:navigate>
                                    <button
                                        class="group relative h-8 w-20 overflow-hidden rounded-lg bg-white text-sm shadow">
                                        <div
                                            class="absolute inset-0 w-3 bg-amber-400 transition-all duration-[250ms] ease-out group-hover:w-full">
                                        </div>
                                        <span class="relative text-black group-hover:text-white">Edit</span>
                                    </button>
                                </a>
                                <button wire:click="destroy({{ $item->id }})"
                                    class="group relative h-8 w-20 overflow-hidden rounded-lg bg-white text-sm shadow">
                                    <div
                                        class="absolute inset-0 w-3 bg-red-500 transition-all duration-[250ms] ease-out group-hover:w-full">
                                    </div>
                                    <span class="relative text-black group-hover:text-white">Delete</span>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4">Data tanaman tidak ditemukan!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="mt-3">
                {{ $plants->links() }}
            </div>
        </div>
    </div>

    <style>
        thead tr th:first-child {
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }

        thead tr th:last-child {
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        tbody tr td:first-child {
            border-top-left-radius: 5px;
            border-bottom-left-radius: 0px;
        }

        tbody tr td:last-child {
            border-top-right-radius: 5px;
            border-bottom-right-radius: 0px;
        }
    </style>
</div>
