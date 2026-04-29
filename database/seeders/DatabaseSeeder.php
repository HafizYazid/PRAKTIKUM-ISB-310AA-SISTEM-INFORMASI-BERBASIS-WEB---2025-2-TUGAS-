<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username' => 'admin',
                'password' => bcrypt('admin123'),
                'created_at' => now(),
                'updated_at' => now()
                
            ]
        ]);

         DB::table('products')->insert([
            [
                'id_product' => 1,
                'nama_product' => 'Laptop Gaming',
                'stok' => 10,
                'harga' => 15000000,
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_product' => 2,
                'nama_product' => 'Headset Gaming',
                'stok' => 20,
                'harga' => 500000,
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_product' => 3,
                'nama_product' => 'Mouse Gaming',
                'stok' => 15,
                'harga' => 300000,
                'id_user' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

    }
}
