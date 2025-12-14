<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .input {
            @apply w-full border rounded px-3 py-2 bg-gray-50 text-sm focus:outline-none focus:ring;
        }
    </style>
</head>

<body class="bg-[#E8F2FF] flex min-h-screen">

    <div class="hidden md:block w-64 bg-white shadow-sm border-r border-gray-400">
        <div class="px-4 py-2 border-b border-gray-400">
            <h1 class="text-2xl font-bold text-gray-700">ERP<span class="font-medium text-sm">.js</span></h1>
        </div>
        <nav class="px-4 justify-between flex flex-col">
            <div class="flex flex-col gap-2">
                <a href="/"
                    class="block mt-2 px-4 py-2 rounded-lg transition text-gray-800 font-medium
                    {{ request()->is('/') ? 'bg-gray-300' : 'hover:bg-gray-300' }}">
                    Dashboard
                </a>
                <a href="/category"
                    class="block px-4 py-2 rounded-lg transition text-gray-800 font-medium
                    {{ request()->is('category') ? 'bg-gray-300' : 'hover:bg-gray-300' }}">
                    Category
                </a>
                <a href="/product"
                    class="block px-4 py-2 rounded-lg transition text-gray-800 font-medium
                    {{ request()->is('product') ? 'bg-gray-300' : 'hover:bg-gray-300' }}">
                    Product
                </a>
                <a href="/bom"
                    class="block px-4 py-2 rounded-lg transition text-gray-800 font-medium
                    {{ request()->is('bom') ? 'bg-gray-300' : 'hover:bg-gray-300' }}">
                    BoM
                </a>
                <a href="/manufacturing-order"
                    class="block px-4 py-2 rounded-lg transition text-gray-800 font-medium
                    {{ request()->is('manufacturing-order') ? 'bg-gray-300' : 'hover:bg-gray-300' }}">
                    Manufacturing Order
                </a>
                <a href="/purchase"
                    class="block px-4 py-2 rounded-lg transition text-gray-800 font-medium
                    {{ request()->is('purchase') ? 'bg-gray-300' : 'hover:bg-gray-300' }}">
                    Purchase
                </a>
                <a href="/sales"
                    class="block px-4 py-2 rounded-lg transition text-gray-800 font-medium
                    {{ request()->is('sales') ? 'bg-gray-300' : 'hover:bg-gray-300' }}">
                    Sales
                </a>
                <a href="/quotation"
                    class="block px-4 py-2 rounded-lg transition text-gray-800 font-medium
                    {{ request()->is('quotation') ? 'bg-gray-300' : 'hover:bg-gray-300' }}">
                    Quotation
                </a>
                <a href="/employe"
                    class="block px-4 py-2 rounded-lg transition text-gray-800 font-medium
                    {{ request()->is('employe') ? 'bg-gray-300' : 'hover:bg-gray-300' }}">
                    Employee
                </a>
            </div>
            <!-- <div class="flex flex-col">
                <a href="/dashboard"
                    class="block mt-2 px-2 py-2 rounded-lg transition
                    {{ request()->is('dashboard') ? 'bg-blue-600 text-white' : 'text-gray-600 hover:bg-gray-200' }}">
                    Dashboard
                </a>
            </div>-->
        </nav>
    </div>

    <div class="flex-1 p-20 overflow-y-auto">
        <div class="w-full h-full bg-white rounded-md p-4 flex flex-col gap-2">
            <div class="flex flex-col gap-6">
                <h1 class="text-2xl font-bold text-gray-800">
                    @yield('header')
                </h1>
                <div class="w-fit">
                    @yield('modal-button')

                    <!-- Template Button -->
                    <!-- <div class="px-4 py-2 rounded-md bg-gray-100 border-2 border-gray-300">Add</div> -->
                </div>
            </div>
            @yield('content')
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @yield('custom-script')

</body>

</html>
