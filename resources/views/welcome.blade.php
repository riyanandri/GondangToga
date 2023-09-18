<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gondang Toga</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:400,600&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <!-- Styles -->
    @vite('resources/css/app.css')
</head>

<body>
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
                                    <button type="button"
                                        class="flex w-full py-3 px-6 rounded-md text-center transition border border-purple-600 bg-white bg-opacity-40 backdrop-blur-md lg:backdrop-blur-none lg:bg-opacity-0 lg:bg-transparent lg:border-transparent active:border-purple-400 justify-center max-w-lg lg:max-w-max">
                                        <span class="block text-gray-700 lg:text-white font-semibold">
                                            Login
                                        </span>
                                    </button>
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

        <img class="absolute inset-0 w-full h-full object-cover object-top"
            src="{{ asset('assets/img/background.jpg') }}" width="400" height="500" alt="hero background image">
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


    <div class="bg-gray-50 dark:bg-gray-900 py-16">
        <div class="container m-auto text-gray-600 dark:text-gray-300 md:px-12 xl:px-6">
            <div class="mb-12 space-y-4 px-6 md:px-0">
                <h2 class="text-center text-2xl font-bold text-gray-800 dark:text-white md:text-4xl">
                    We have some fans.
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
                            class="p-2 border border-gray-100 dark:border-gray-700 rounded-3xl bg-white dark:bg-gray-800 shadow-2xl shadow-gray-600/10 dark:shadow-none md:mx-auto lg:w-10/12 xl:w-8/12">
                            <div class="grid md:grid-cols-5">
                                <img src="images/card.webp" class="md:col-span-2 h-full w-full rounded-2xl object-cover"
                                    alt="image" width="640" height="422" loading="lazy" />
                                <div class="md:col-span-3 mx-auto space-y-6 p-6 text-center sm:p-8">
                                    <div class="mx-auto w-24">
                                        <img src="images/clients/client-4.png" alt="company logo" height="400"
                                            width="142" loading="lazy" />
                                    </div>
                                    <p>
                                        <span class="font-serif">"</span> Lorem ipsum dolor sit amet consectetur
                                        adipisicing elit. Quaerat repellat perspiciatis excepturi est. Non ipsum iusto
                                        aliquam consequatur repellat provident, omnis ut, sapiente voluptates
                                        veritatis cum deleniti repudiandae ad doloribus.
                                        <span class="font-serif">"</span>
                                    </p>
                                    <h6 class="text-lg font-semibold leading-none">John Doe</h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide !bg-transparent px-6 md:px-0">
                        <div
                            class="p-2 border border-gray-100 dark:border-gray-700 rounded-3xl bg-white dark:bg-gray-800 shadow-2xl shadow-gray-600/10 dark:shadow-none md:mx-auto lg:w-10/12 xl:w-8/12">
                            <div class="grid md:grid-cols-5">
                                <img src="images/card3.webp"
                                    class="md:col-span-2 h-full w-full rounded-2xl object-cover" alt="image"
                                    width="640" height="422" loading="lazy" />
                                <div class="md:col-span-3 mx-auto space-y-6 p-6 text-center sm:p-8">
                                    <div class="mx-auto w-24">
                                        <img src="images/clients/client-3.png" alt="company logo" height="400"
                                            width="142" loading="lazy" />
                                    </div>
                                    <p>
                                        <span class="font-serif">"</span> Lorem ipsum dolor sit amet consectetur
                                        adipisicing elit. Quaerat repellat perspiciatis excepturi est. Non ipsum iusto
                                        aliquam consequatur repellat provident, omnis ut, sapiente voluptates
                                        veritatis cum deleniti repudiandae ad doloribus.
                                        <span class="font-serif">"</span>
                                    </p>
                                    <h6 class="text-lg font-semibold leading-none">John Doe</h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide !bg-transparent px-6 md:px-0">
                        <div
                            class="p-2 border border-gray-100 dark:border-gray-700 rounded-3xl bg-white dark:bg-gray-800 shadow-2xl shadow-gray-600/10 dark:shadow-none md:mx-auto lg:w-10/12 xl:w-8/12">
                            <div class="grid md:grid-cols-5">
                                <img src="images/card2.webp"
                                    class="md:col-span-2 h-full w-full rounded-2xl object-cover" alt="image"
                                    width="640" height="422" loading="lazy" />
                                <div class="md:col-span-3 mx-auto space-y-6 p-6 text-center sm:p-8">
                                    <div class="mx-auto w-24">
                                        <img src="images/clients/client-8.png" alt="company logo" height="400"
                                            width="142" loading="lazy" />
                                    </div>
                                    <p>
                                        <span class="font-serif">"</span> Lorem ipsum dolor sit amet consectetur
                                        adipisicing elit. Quaerat repellat perspiciatis excepturi est. Non ipsum iusto
                                        aliquam consequatur repellat provident, omnis ut, sapiente voluptates
                                        veritatis cum deleniti repudiandae ad doloribus.
                                        <span class="font-serif">"</span>
                                    </p>
                                    <h6 class="text-lg font-semibold leading-none">John Doe</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>


    <script>
        window.addEventListener('scroll', e => {
            const header = document.querySelector('#header_')
            e.preventDefault()
            header.classList.toggle('sticky-nav', window.scrollY > 0);
        })

        const toggleMobileMenu = document.querySelector('#hamburger')
        const navbar = document.querySelector('#navbar')

        toggleMobileMenu.addEventListener('click', e => {
            e.preventDefault()
            toggleMobileMenu.querySelector('#line').classList.toggle('rotate-45')
            toggleMobileMenu.querySelector('#line').classList.toggle('translate-y-1.5')

            toggleMobileMenu.querySelector('#line2').classList.toggle('-rotate-45')
            toggleMobileMenu.querySelector('#line2').classList.toggle('-translate-y-1')
            if (navbar.clientHeight === 0) {
                navbar.style.paddingTop = '20px'
                navbar.style.paddingBottom = '20px'
                navbar.style.height = `${parseInt(navbar.scrollHeight) + 60}px`
                return
            }
            navbar.style.height = '0px'
            navbar.style.paddingTop = '0px'
            navbar.style.paddingBottom = '0px'
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.mySwiper', {
                    spaceBetween: 15,
                    slidesPerView: 3,
                    pagination: {
                        el: ".swiper-pagination",
                        clickable: true
                    },
                    speed: 1000,
                    loop: true,
                }
    </script>
</body>

</html>
