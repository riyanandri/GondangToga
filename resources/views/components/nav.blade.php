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
