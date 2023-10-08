@extends('layouts.web')

@section('content')
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
                        <input placeholder="Silahkan ketik yang ingin anda cari di website ini"
                            class="w-full border-transparent focus:border-transparent focus:ring-0 p-4 text-gray-600"
                            type="text">
                        <button type="button"
                            class="ml-auto py-3 px-6 rounded-lg text-center transition bg-gradient-to-br from-green-700 to-green-100 hover:to-green-300 active:from-green-800 focus:from-green-800 md:px-12">
                            <span class="hidden text-white font-semibold md:block">
                                Cari
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 mx-auto text-white md:hidden"
                                fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>

            <div class="pb-16">
                <div class="md:px-12">
                    <h3 class="text-white text-center text-xl font-bold sm:text-2xl md:text-3xl">
                        Tanaman Obat Desa Growong
                    </h3>
                    <div class="mt-8 -mx-6 px-6 overflow-x-auto md:overflow-x-hidden">
                        <p class="text-center text-lg text-gray-600 dark:text-gray-300">Lorem ipsum dolor sit amet
                            consectetur
                            adipisicing elit. Praesentium tempore totam quisquam eveniet dolorum facere sed obcaecati
                            repellat, optio, dignissimos iusto error! Consequuntur a ad quo, veniam reiciendis minima
                            vitae.</p>
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
                <p class="text-center">
                    We don't like to brag, but we don't mind letting our customers do it for us. <br />
                    Here are a few nice things folks have said about our themes over the years.
                </p>
                <div id="map"></div>
            </div>
        </div>
    </div>
@endsection
