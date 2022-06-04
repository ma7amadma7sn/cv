<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('assets/css/flowbite.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com"></script>
    @livewireStyles
</head>
<body class="bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700">
    <div id="app">
        <nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded">
            <div class="container flex flex-wrap justify-between items-center mx-auto">
            <a href="/home" class="flex items-center">
                <img src="assets/image/nav.png" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo" />
                <span class="self-center text-xl font-semibold whitespace-nowrap ">Send Your CV</span>
            </a>
            <div class="flex md:order-2">
                @auth
                <a href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();"class="text-white shadow-lg shadow-red-500/50 bg-gradient-to-r from-red-400 via-red-500 to-red-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                @endauth
                <button data-collapse-toggle="mobile-menu-4" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="mobile-menu-4" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
              </button>
            </div>
            <div class="hidden justify-between items-center w-full md:flex md:w-auto md:order-1" id="mobile-menu-4">
              <ul class="flex flex-col mt-4 text-center md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
                @auth
                <li>
                  <a href="/home" class="block py-2 pr-4 pl-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0" aria-current="page">Home</a>
                </li>
                <li>
                  <a href="/contact" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">Contact</a>
                </li>
                @endauth
                @guest
                <li>
                  <a href="/login" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">Login</a>
                </li>
                <li>
                  <a href="/register" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">Register</a>
                </li>
                @endguest
              </ul>
            </div>
            </div>
          </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('assets/lib/app.js') }}"></script>
    <script src="{{ asset('assets/lib/flowbite.min.js') }}"></script>
    @livewireScripts
</body>
</html>
