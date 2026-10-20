<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    @include('layouts.navigation')
    <div class="w-full py-12 flex flex-col justify-center items-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="">
                        <h1 class="text-xl font-bold">EDIT SERVICE</h1>
                    </div>
                    <div class="">
                        <p class="">Disini anda bisa memilih layanan apa saja yang anda inginkan</p>
                    </div>
                </div>
            </div>
            <div class="">
                <form action="{{ route('service.store') }}" method="POST" class="">
                    @csrf
                    @method('POST')
                    <div class="">
                        <label for="">Nama Layanan</label>
                        <input type="text" value="" name="name">
                    </div>
                    <div class="">
                        <label for="">Deskripsi</label>
                        <input type="text" value="" name="description">
                    </div>
                    <div class="">
                        <label for="">Price</label>
                        <input type="number" value="" name="price">
                    </div>

                    <a href="{{ route('admin.index') }}" class="">Kembali</a>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>

</body>

</html>
