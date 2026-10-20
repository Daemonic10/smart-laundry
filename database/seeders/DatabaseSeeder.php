<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Transaction;
use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
        ]);

        Service::create([
            'name' => 'Cuci',
            'description' => 'anda dapat mencuci disini',
            'price' => 100000,
        ]);

        Service::create([
            'name' => 'Setrika',
            'description' => 'anda dapat mencuci disini',
            'price' => 100000,
        ]);


        Transaction::create([
            'invoice_code'  => 'RENT-' . rand(100, 999),
            'customer_name' => 'Dennis',
            'phone'         => '083242493', // pastikan sesuai tipe data di database
            'service_id'    => 1,           // Wajib diisi (ID dari tabel services)
            'weight'        => 10,
            'total_price'   => 100000,
            'status'        => 'pending',   // 'pending', 'proses cuci', atau 'diambil'
        ]);

        Transaction::create([
            'invoice_code'  => 'RENT-' . rand(100, 999),
            'customer_name' => 'Dennis',
            'phone'         => '083242493', // pastikan sesuai tipe data di database
            'service_id'    => 2,           // Wajib diisi (ID dari tabel services)
            'weight'        => 10,
            'total_price'   => 100000,
            'status'        => 'pending',   // 'pending', 'proses cuci', atau 'diambil'
        ]);
    }
}
