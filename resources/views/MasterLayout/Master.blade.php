<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#E8F2FF] flex min-h-screen">

    <div class="hidden md:block w-64 bg-white shadow-sm">
        <div class="p-6">
            <h1 class="text-xl font-bold text-gray-700 ">ERP.js</h1>
            <span class="w-8 h-1 bg-gray-600 block mt-2"></span>
        </div>
        <hr class="bg-slate-300 ">

        <nav class="px-4  space-y-1 justify-between flex flex-col h-[85vh]">
            <div class="flex flex-col">
                <a href="/dashboard"
                    class="block mt-2 px-2 py-2 rounded-lg transition
                    {{ request()->is('dashboard') ? 'bg-blue-600 text-white' : 'text-gray-600 hover:bg-gray-200' }}">
                    Dashboard
                </a>
                <a href="/produk"
                    class="block px-2 py-2 rounded-lg transition
                    {{ request()->is('produk') ? 'bg-blue-600 text-white' : 'text-gray-600 hover:bg-gray-200' }}">
                    Produk
                </a>
                <a href="/produk"
                    class="block px-2 py-2 rounded-lg transition
                    {{ request()->is('produk') ? 'bg-blue-600 text-white' : 'text-gray-600 hover:bg-gray-200' }}">
                    Produk
                </a>

            </div>
            <div class="flex flex-col">
                <a href="/dashboard"
                    class="block mt-2 px-2 py-2 rounded-lg transition
                    {{ request()->is('dashboard') ? 'bg-blue-600 text-white' : 'text-gray-600 hover:bg-gray-200' }}">
                    Dashboard
                </a>

            </div>

        </nav>
    </div>

    <div class="flex-1 p-4 md:p-8 overflow-y-auto">

        <h1 class="text-2xl font-semibold text-gray-800 mb-6">
            @yield('header')
        </h1>

        @yield('content')

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @yield('custom-script')

</body>

</html>
