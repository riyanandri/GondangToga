@extends('layouts.web')

@section('content')
    <header>
        <nav id="header_" class="fixed top-0 left-0 z-20 w-full transition-all ease-in">
            <div class="container m-auto px-6 md:px-12 lg:px-6">
                <div class="flex flex-wrap items-center justify-between py-6 md:py-4 md:gap-0">
                    <div class="w-full flex items-center justify-between lg:w-auto">
                        <a href="#" aria-label="logo">
                            <img src="{{ asset('assets/img/Logo-PPK-HIMAFA.png') }}" class="w-36" alt="logo"
                                width="144" height="48">
                        </a>

                        <div class="block max-w-max">
                            <button aria-label="humburger" id="hamburger" class="block relative h-auto lg:hidden">
                                <div aria-hidden="true" id="line"
                                    class="m-auto h-0.5 w-6 rounded bg-gray-100 transition duration-300"></div>
                                <div aria-hidden="true" id="line2"
                                    class="m-auto mt-2 h-0.5 w-6 rounded bg-gray-100 transition duration-300"></div>
                            </button>
                        </div>
                    </div>

                    <div id="navbar"
                        class="flex h-0 lg:h-auto overflow-hidden lg:flex lg:pt-0 w-full md:space-y-0 lh:p-0 md:bg-transparent lg:w-auto transition-all duration-300">
                        <div id="navBox"
                            class="w-full p-6 lg:p-0 bg-white bg-opacity-40 backdrop-blur-md lg:items-center flex flex-col lg:flex-row lg:bg-transparent transition-all ease-in">
                            <ul
                                class="space-y-6 pb-6 tracking-wide font-medium text-gray-800 lg:text-gray-100 lg:pb-0 lg:pr-6 lg:items-center lg:flex lg:space-y-0">
                                <li>
                                    <a href="#" class="block md:px-3">
                                        <span>Beranda</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="block md:px-3">
                                        <span>Tanaman</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="block md:px-3">
                                        <span>Produk</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="block md:px-3">
                                        <span>Profil Desa</span>
                                    </a>
                                </li>
                            </ul>

                            <ul
                                class="border-t w-full lg:w-max gap-3 pt-2 lg:pt-0 lg:pl-2 lg:border-t-0 lg:border-l flex flex-col lg:gap-0 lg:items-center lg:flex-row">
                                <li class="flex w-full lg:max-w-max justify-center">
                                    <a href="{{ route('login') }}"><button type="button"
                                            class="flex w-full py-3 px-6 rounded-md text-center transition border border-purple-600 bg-white bg-opacity-40 backdrop-blur-md lg:backdrop-blur-none lg:bg-opacity-0 lg:bg-transparent lg:border-transparent active:border-purple-400 justify-center max-w-lg lg:max-w-max">
                                            <span class="block text-gray-700 lg:text-white font-semibold">
                                                Login
                                            </span>
                                        </button></a>
                                </li>

                                {{-- <li class="flex w-full lg:max-w-max justify-center">
                                <button type="button" title="Start buying"
                                    class="flex w-full py-3  px-6 rounded-lg text-center transition bg-purple-600 lg:bg-white active:bg-purple-700 lg:active:bg-purple-200 focus:bg-purple-500 lg:focus:bg-purple-100 justify-center max-w-lg lg:max-w-max">
                                    <span class="block text-sm text-white lg:text-purple-600 font-semibold">
                                        Sign In
                                    </span>
                                </button>
                            </li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

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
                            class="ml-auto py-3 px-6 rounded-lg text-center transition bg-gradient-to-br from-green-800 to-green-100 hover:to-green-200 active:from-pink-700 focus:from-pink-600 md:px-12">
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


    <footer>
        <svg xmlns="http://www.w3.org/2000/svg" class="-mb-0.5 w-full" viewBox="0 0 1367.743 181.155">
            <path class="fill-current text-gray-100 dark:text-gray-800" id="wave" data-name="wave"
                d="M0,0S166.91-56.211,405.877-49.5,715.838,14.48,955.869,26.854,1366,0,1366,0V115H0Z"
                transform="translate(1.743 66.155)"></path>
        </svg>
        <div class="bg-gradient-to-b from-gray-100 to-transparent dark:from-gray-800 dark:to-transparent pt-1">
            <div class="container m-auto space-y-8 px-6 text-gray-600 dark:text-gray-400 md:px-12 lg:px-20">
                <div class="grid grid-cols-8 gap-6 md:gap-0">
                    <div class="col-span-8 border-r border-gray-100 dark:border-gray-800 md:col-span-2 lg:col-span-3">
                        <div
                            class="flex items-center justify-between gap-6 border-b border-white dark:border-gray-800 py-6 md:block md:space-y-6 md:border-none md:py-0">
                            <img src="images/logo.svg" alt="logo GondangToga" width="100" height="42"
                                class="w-32 dark:brightness-200 dark:grayscale" />
                            <div class="flex gap-6">
                                <a href="#" target="blank" aria-label="github" class="hover:text-cyan-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                                        <path
                                            d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z" />
                                    </svg>
                                </a>
                                <a href="#" target="blank" aria-label="twitter" class="hover:text-cyan-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                                        <path
                                            d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                                    </svg>
                                </a>
                                <a href="#" target="blank" aria-label="medium" class="hover:text-cyan-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" class="bi bi-medium" viewBox="0 0 16 16">
                                        <path
                                            d="M9.025 8c0 2.485-2.02 4.5-4.513 4.5A4.506 4.506 0 0 1 0 8c0-2.486 2.02-4.5 4.512-4.5A4.506 4.506 0 0 1 9.025 8zm4.95 0c0 2.34-1.01 4.236-2.256 4.236-1.246 0-2.256-1.897-2.256-4.236 0-2.34 1.01-4.236 2.256-4.236 1.246 0 2.256 1.897 2.256 4.236zM16 8c0 2.096-.355 3.795-.794 3.795-.438 0-.793-1.7-.793-3.795 0-2.096.355-3.795.794-3.795.438 0 .793 1.699.793 3.795z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-8 md:col-span-6 lg:col-span-5">
                        <div class="grid grid-cols-2 gap-6 pb-16 sm:grid-cols-3 md:pl-16">
                            <div>
                                <h6 class="text-lg font-medium text-gray-800 dark:text-gray-200">Company</h6>
                                <ul class="mt-4 list-inside space-y-4">
                                    <li>
                                        <a href="#" class="transition hover:text-cyan-600">About</a>
                                    </li>
                                    <li>
                                        <a href="#" class="transition hover:text-cyan-600">Customers</a>
                                    </li>
                                    <li>
                                        <a href="#" class="transition hover:text-cyan-600">Enterprise</a>
                                    </li>
                                    <li>
                                        <a href="#" class="transition hover:text-cyan-600">Partners</a>
                                    </li>
                                    <li>
                                        <a href="#" class="transition hover:text-cyan-600">Jobs</a>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <h6 class="text-lg font-medium text-gray-800 dark:text-gray-200">Products</h6>
                                <ul class="mt-4 list-inside space-y-4">
                                    <li>
                                        <a href="#" class="transition hover:text-cyan-600">About</a>
                                    </li>
                                    <li>
                                        <a href="#" class="transition hover:text-cyan-600">Customers</a>
                                    </li>
                                    <li>
                                        <a href="#" class="transition hover:text-cyan-600">Enterprise</a>
                                    </li>
                                    <li>
                                        <a href="#" class="transition hover:text-cyan-600">Partners</a>
                                    </li>
                                    <li>
                                        <a href="#" class="transition hover:text-cyan-600">Jobs</a>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <h6 class="text-lg font-medium text-gray-800 dark:text-gray-200">Ressources</h6>
                                <ul class="mt-4 list-inside space-y-4">
                                    <li>
                                        <a href="#" class="transition hover:text-cyan-600">About</a>
                                    </li>
                                    <li>
                                        <a href="#" class="transition hover:text-cyan-600">Customers</a>
                                    </li>
                                    <li>
                                        <a href="#" class="transition hover:text-cyan-600">Enterprise</a>
                                    </li>
                                    <li>
                                        <a href="#" class="transition hover:text-cyan-600">Partners</a>
                                    </li>
                                    <li>
                                        <a href="#" class="transition hover:text-cyan-600">Jobs</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="flex justify-between border-t border-gray-100 dark:border-gray-800 py-4 pb-8 md:pl-16">
                            <span>&copy; GondangToga 2003 - <span id="year"></span> </span>
                            <span>All right reserved</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
@endsection
