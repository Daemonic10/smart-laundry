<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard - Service</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    @include('layouts.navigation')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg justify-between flex flex-row items-center">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="">
                        <h1 class="text-xl font-bold">Admin Dashboard</h1>
                    </div>
                    <div class="">
                        <p class="">Disini anda bisa memilih layanan apa saja yang anda inginkan</p>
                    </div>
                </div>
                <div class="px-8 items-center">
                    <a href="{{ route('service.create') }}" class="bg-blue-500 py-2 px-6 rounded-lg text-white">+
                        Service</a>
                </div>
            </div>
        </div>


    </div>
    <div class="w-full flex justify-center px-10">

        <table class="w-full text-center items-center p-8 mx-8 border border-slate-400 rounded-lg border-colapse">
            <thead class="bg-slate-200 p-4">
                <tr class="">
                    <th class="">ID</th>
                    <th class="">NAMA LAYANAN</th>
                    <th class="">DESCRIPTION</th>
                    <th class="">PRICE</th>
                    <th class="">AKSI</th>
                </tr>
            </thead>
            <tbody class="">
                @foreach ($services as $service)
                    <tr class="">
                        <td class="">{{ $service->id }}</td>
                        <td class="">{{ $service->name }}</td>
                        <td class="">{{ $service->description }}</td>
                        <td class="">{{ $service->price }}</td>
                        <td class="">
                            <a href="{{ route('service.edit', $service) }}" class="hover:underline">EDIT</a>
                            <a href="{{ route('service.destroy', $service) }}"
                                class="hover:underline hover:bg-red-900">HAPUS</a>

                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>
