<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Konfirmasi Pesanan</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
    @include('layouts.navigationCustomer')
    <div class="max-w-2xl mx-auto py-12 px-4">
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg">
            <h1 class="text-xl font-bold mb-4 border-b pb-2">Konfirmasi Total Harga</h1>

            <div class="space-y-3 mb-6">
                <p><strong>Nama:</strong> {{ $validated['customer_name'] }}</p>
                <p><strong>No. Telepon:</strong> {{ $validated['phone'] }}</p>
                <p><strong>Layanan:</strong> {{ $service->name }} (Rp {{ number_format($service->price) }}/kg)</p>
                <p><strong>Berat:</strong> {{ $validated['weight'] }} kg</p>

                <div class="p-4 bg-blue-50 dark:bg-blue-900/40 rounded-lg mt-4">
                    <span class="text-sm text-gray-600 dark:text-gray-300">Estimasi Total Harga:</span>
                    <h2 class="text-3xl font-extrabold text-blue-600 dark:text-blue-400 mt-1">
                        Rp {{ number_format($total_price, 0, ',', '.') }}
                    </h2>
                </div>
            </div>

            <form action="{{ route('transaction.store') }}" method="POST">
                @csrf
                <!-- Kirim data tersembunyi untuk disimpan ke DB -->
                <input type="hidden" name="customer_name" value="{{ $validated['customer_name'] }}">
                <input type="hidden" name="phone" value="{{ $validated['phone'] }}">
                <input type="hidden" name="service_id" value="{{ $validated['service_id'] }}">
                <input type="hidden" name="weight" value="{{ $validated['weight'] }}">
                <input type="hidden" name="total_price" value="{{ $total_price }}">

                <div class="flex justify-between items-center pt-4">
                    <a href="{{ route('transaction.create') }}"
                        class="text-gray-600 dark:text-gray-300 hover:underline">&larr; Ubah Pesanan</a>
                    <button type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg font-bold">
                        Konfirmasi & Buat Pesanan
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
