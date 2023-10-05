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

    <div class="bg-gradient-to-b from-gray-800 to-gray-100 py-16">
        <div class="container m-auto text-gray-600 dark:text-gray-300 md:px-12 xl:px-6">
            <div class="mb-12 space-y-4 px-6 md:px-0">
                <h2 class="text-center text-2xl font-bold text-gray-800 dark:text-white md:text-4xl">
                    Tanaman Kami.
                </h2>
                <p class="text-center">
                    We don't like to brag, but we don't mind letting our customers do it for us. <br />
                    Here are a few nice things folks have said about our themes over the years.
                </p>
            </div>
            <div class="swiper mySwiper">
                <div class="swiper-wrapper pb-8">
                    <div class="swiper-slide !bg-transparent px-6 md:px-0">
                        <div
                            class="p-2 border border-gray-100 dark:border-gray-700 rounded-3xl bg-white shadow-2xl shadow-gray-600/10 dark:shadow-none md:mx-auto lg:w-10/12 xl:w-8/12">
                            <div class="grid md:grid-cols-5">
                                <img src="{{ asset('assets/img/jage.jpeg') }}"
                                    class="md:col-span-2 h-full w-full rounded-2xl object-cover" alt="image"
                                    width="640" height="422" loading="lazy" />
                                <div class="md:col-span-3 mx-auto space-y-6 p-6 text-center sm:p-8">
                                    <h6 class="text-2xl font-bold leading-none">Jahe</h6>
                                    <p>
                                        <span class="font-serif">"</span> Lorem ipsum dolor sit amet consectetur
                                        adipisicing elit. Quaerat repellat perspiciatis excepturi est. Non ipsum iusto
                                        aliquam consequatur repellat provident, omnis ut, sapiente voluptates
                                        veritatis cum deleniti repudiandae ad doloribus.
                                        <span class="font-serif">"</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>


    <div class="bg-gradient-to-b from-gray-800 to-gray-100 py-16">
        <div class="xl:container m-auto px-6 text-gray-600 md:px-12 xl:px-16">
            <div
                class="lg:bg-gray-50 dark:lg:bg-darker lg:p-16 rounded-[4rem] space-y-6 md:flex flex-row-reverse md:gap-6 justify-center md:space-y-0 lg:items-center">
                <div class="md:5/12 lg:w-1/2">
                    <img src="images/pie.svg" alt="image" loading="lazy" width="" height="" />
                </div>
                <div class="md:7/12 lg:w-1/2">
                    <h2 class="text-3xl font-bold text-gray-900 md:text-4xl dark:text-black">
                        Pemetaan
                    </h2>
                    <p class="my-8 text-gray-600 dark:text-gray-300">
                        Nobis minus voluptatibus pariatur dignissimos libero quaerat iure expedita at?
                        Asperiores nemo possimus nesciunt dicta veniam aspernatur quam mollitia.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
