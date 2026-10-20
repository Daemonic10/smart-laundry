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
                    <th class="">INVOICE CODE</th>
                    <th class="">CUSTOMER NAME</th>
                    <th class="">PHONE</th>
                    <th class="">SERVICE</th>
                    <th class="">WEIGHT</th>
                    <th class="">TOTAL PRICE</th>
                    <th class="">STATUS</th>
                    <th class="">AKSI</th>
                </tr>
            </thead>
            <tbody class="">
                @foreach ($transactions as $transaction)
                    <tr class="">
                        <td class="">{{ $transaction->id }}</td>
                        <td class="">{{ $transaction->invoice_code }}</td>
                        <td class="">{{ $transaction->customer_name }}</td>
                        <td class="">{{ $transaction->phone }}</td>
                        <td class="">{{ $transaction->service?->name ?? 'layanan tidak ditemukan' }}</td>
                        <td class="">{{ $transaction->weight }}</td>
                        <td class="">{{ $transaction->total_price }}</td>
                        <td class="">
                            <form action="{{ route('admin.updatestatus', $transaction->id) }}" class=""
                                method="POST">
                                @csrf
                                @method('PUT')
                                <select name="status" id="" onchange="this.form.submit()">
                                    <option value="pending" {{ $transaction->status == 'pending' ? 'selected' : '' }}
                                        class="">PENDING</option>
                                    <option value="proses cuci"
                                        {{ $transaction->status == 'proses cuci' ? 'selected' : '' }} class="">
                                        PROSES CUCI</option>
                                    <option value="diambil" {{ $transaction->status == 'diambil' ? 'selected' : '' }}
                                        class="">DIAMBIL</option>
                                </select>
                            </form>
                        </td>



                        <td class="">
                            <a href="{{ route('service.edit', $transaction) }}" class="hover:underline">EDIT</a>
                            <a href="{{ route('service.destroy', $transaction) }}"
                                onclick="return confirm('yakin mau hapus?')"
                                class="hover:underline hover:bg-red-900">HAPUS</a>

                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>
