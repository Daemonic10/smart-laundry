<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MENU - Service</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    @include('layouts.navigationCustomer')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="">
                        <h1 class="text-xl font-bold">Services</h1>
                    </div>
                    <div class="">
                        <p class="">Disini anda bisa memilih layanan apa saja yang anda inginkan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-8 grid grid-cols-3">
        @foreach ($services as $service)
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
                <div
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg flex flex-row justify-beetween items-center">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="">
                            <h1 class="text-xl font-bold">{{ $service->name }}</h1>
                            <p class="">{{ $service->description }}</p>
                        </div>
                        <div class="">
                            <p class="">Rp. {{ $service->price }}</p>
                        </div>
                    </div>
                    <div class="px-8 items-center">
                        <a href="{{ route('transaction.create') }}"
                            class="bg-blue-500 py-2 px-6 rounded-lg text-white">Order</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</body>

</html>
