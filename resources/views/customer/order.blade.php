<form action="{{ route('transaction.show') }}" method="POST" class="space-y-4">
    @csrf
    <div>
        <label class="block font-semibold mb-1">Pilih Layanan</label>
        <select name="service_id" class="w-full border rounded p-2 dark:bg-gray-700 dark:text-white" required>
            <option value="">-- Pilih Layanan Laundry --</option>
            @foreach ($services as $service)
                <option value="{{ $service->id }}">
                    {{ $service->name }} - Rp {{ number_format($service->price) }} /kg
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block font-semibold mb-1">Customer Name</label>
        <input type="text" name="customer_name" class="w-full border rounded p-2 dark:bg-gray-700 dark:text-white"
            required>
    </div>

    <div>
        <label class="block font-semibold mb-1">Phone</label>
        <input type="number" name="phone" class="w-full border rounded p-2 dark:bg-gray-700 dark:text-white"
            required>
    </div>

    <div>
        <label class="block font-semibold mb-1">Weight (Kg)</label>
        <input type="number" name="weight" step="0.1" min="0.1"
            class="w-full border rounded p-2 dark:bg-gray-700 dark:text-white" required>
    </div>

    <div class="flex justify-between items-center pt-4">
        <a href="{{ route('service.index') }}" class="text-gray-600 dark:text-gray-300 hover:underline">Kembali</a>
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded font-semibold">Cek
            Total Harga &rarr;</button>
    </div>
</form>
