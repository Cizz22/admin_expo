<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="2?family=Nunito:wght@400;600;700&display=swap">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Styles -->
    @livewireStyles
    @powerGridStyles
</head>

<body class="font-sans antialiased">
    <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-black font-roboto">
        <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false"
            class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden"></div>

        <div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'"
            class="fixed z-30 inset-y-0 left-0 w-64 transition duration-300 transform bg-custom-gray overflow-y-auto lg:translate-x-0 lg:static lg:inset-0">
            <div class="flex items-center justify-center mt-4">
                <div class="flex items-center">
                    {{-- <svg  viewBox="0 0 512 512" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M364.61 390.213C304.625 450.196 207.37 450.196 147.386 390.213C117.394 360.22 102.398 320.911 102.398 281.6C102.398 242.291 117.394 202.981 147.386 172.989C147.386 230.4 153.6 281.6 230.4 307.2C230.4 256 256 102.4 294.4 76.7999C320 128 334.618 142.997 364.608 172.989C394.601 202.981 409.597 242.291 409.597 281.6C409.597 320.911 394.601 360.22 364.61 390.213Z"
                                fill="#4C51BF" stroke="#4C51BF" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M201.694 387.105C231.686 417.098 280.312 417.098 310.305 387.105C325.301 372.109 332.8 352.456 332.8 332.8C332.8 313.144 325.301 293.491 310.305 278.495C295.309 263.498 288 256 275.2 230.4C256 243.2 243.201 320 243.201 345.6C201.694 345.6 179.2 332.8 179.2 332.8C179.2 352.456 186.698 372.109 201.694 387.105Z"
                                fill="white" />
                        </svg> --}}

                    <svg class="h-12 w-12 -mx-3" version="1.0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                        fill="none">

                        <g transform="translate(0.000000,450.000000) scale(0.100000,-0.100000)" fill="#F0FFFF"
                            stroke="none">
                            <path
                                d="M1765 3804 c-364 -42 -628 -129 -880 -292 -1028 -660 -1185 -2092
                        -325 -2952 743 -743 1947 -743 2690 0 570 570 719 1440 371 2165 -263 547
                        -763 934 -1356 1049 -153 30 -381 43 -500 30z m1057 -782 c77 -37 128 -90 167
                        -172 22 -47 26 -68 26 -145 0 -82 -3 -97 -33 -157 -37 -77 -90 -128 -172 -167
                        l-55 -26 -930 0 -930 0 -57 27 c-73 34 -142 103 -176 176 -23 49 -27 70 -27
                        147 0 76 4 99 26 145 45 97 112 157 212 191 49 17 107 18 967 16 l915 -2 67
                        -33z m410 -834 c73 -34 142 -103 176 -176 23 -49 27 -70 27 -147 0 -77 -4 -98
                        -27 -147 -34 -73 -103 -142 -176 -176 l-57 -27 -720 0 -720 0 -57 27 c-247
                        116 -279 455 -57 611 97 68 67 66 849 64 l705 -2 57 -27z m-1409 -835 c80 -37
                        143 -97 179 -171 30 -60 33 -75 33 -157 0 -77 -4 -98 -27 -147 -34 -73 -103
                        -142 -176 -176 l-57 -27 -440 0 -440 0 -57 27 c-73 34 -142 103 -176 176 -23
                        49 -27 70 -27 147 0 76 4 99 26 145 45 97 112 157 212 192 48 16 88 18 477 15
                        416 -2 426 -2 473 -24z" />
                    </svg>

                    <span class="text-white text-xl mx-2 font-semibold">UKM Expo</span>
                </div>
            </div>

            <hr>

            <nav class="mt-5" x-data="{ dropdownverif: false, dropdowndaftar:false }">
                <a class="flex items-center mt-4 py-2 px-6 hover:bg-opacity-25 hover:text-gray-100 {{ Request::is('admin/dashboard*') ? ' bg-gray-700 bg-opacity-25 text-gray-100' : 'text-gray-500' }}"
                    href="">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                        </path>
                    </svg>

                    <span class="mx-3">Dashboard</span>
                </a>

                <button type="button" @click="dropdownverif = ! dropdownverif" class="flex items-center mt-4 py-2 px-6 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 {{ Request::is('verifikasi') ? ' bg-gray-700 bg-opacity-25 text-gray-100' : 'text-gray-500' }}">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9">
                        </path>
                    </svg>

                    <span class="mx-3">Verifikasi</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
              </button>
                      <ul x-show="dropdownverif" class="py-2 space-y-2">
                          <li>
                              <a href="{{ route('verifikasi') }}"
                                  class="flex justify-between ml-4 items-center w-full p-2 text-base font-normal text-white transition duration-75 rounded-lg group hover:bg-gray-100 hover:text-black  dark:hover:bg-gray-700 pl-11">Presale 1</a>
                          </li>
                          <li>
                              <a href="{{route('verifikasi-2')}}"
                                  class="flex justify-between ml-4 items-center w-full p-2 text-base font-normal text-white transition duration-75 rounded-lg group hover:bg-gray-100 hover:text-black  dark:hover:bg-gray-700 pl-11">Presale 2 & 3</a>
                          </li>

                      </ul>

                      <button type="button" @click="dropdowndaftar = ! dropdowndaftar" class="flex items-center mt-4 py-2 px-6 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 {{ Request::is('verifikasi') ? ' bg-gray-700 bg-opacity-25 text-gray-100' : 'text-gray-500' }}">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                        </path>
                    </svg>

                        <span class="mx-3">Daftar Pembeli</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                  </button>
                          <ul x-show="dropdowndaftar" class="py-2 space-y-2">
                              <li>
                                  <a href="{{ route('pembeli') }}"
                                      class="flex justify-between ml-4 items-center w-full p-2 text-base font-normal text-white transition duration-75 rounded-lg group hover:bg-gray-100 hover:text-black  dark:hover:bg-gray-700 pl-11">Presale 1</a>
                              </li>
                              <li>
                                  <a href="{{route('pembeli-2')}}"
                                      class="flex justify-between ml-4 items-center w-full p-2 text-base font-normal text-white transition duration-75 rounded-lg group hover:bg-gray-100 hover:text-black  dark:hover:bg-gray-700 pl-11">Presale 2 & 3</a>
                              </li>

                          </ul>


            </nav>
        </div>
        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="flex justify-between items-center py-4 px-6 bg-gray-300">
                <div class="flex items-center">
                    <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden">
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
                <div class="flex-1 px-5 items-center">
                    <span class="text-2xl font-bold text-white">Dashboard</span>
                </div>

                <div class="flex items-center">

                    <div x-data="{ dropdownOpen: false }" class="relative">
                        <button @click="dropdownOpen = ! dropdownOpen"
                            class="relative block h-8 w-8 rounded-full overflow-hidden shadow focus:outline-none">
                            <<svg xmlns="http://www.w3.org/2000/svg" fill="black" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M224 256c70.7 0 128-57.31 128-128s-57.3-128-128-128C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z"/></svg>
                        </button>

                        <div x-show="dropdownOpen" @click="dropdownOpen = false"
                            class="fixed inset-0 h-full w-full z-10"></div>

                        <div x-show="dropdownOpen"
                            class="absolute right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-sm z-10">
                            <div class="block px-4 py-2 text-sm text-gray-700">
                                {{ auth()->user()->name }}
                            </div>
                            <hr>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </header>
            {{ $slot }}

        </div>
    </div>
    @stack('js')
    @livewireScripts
    @powerGridScripts
</body>

</html>
