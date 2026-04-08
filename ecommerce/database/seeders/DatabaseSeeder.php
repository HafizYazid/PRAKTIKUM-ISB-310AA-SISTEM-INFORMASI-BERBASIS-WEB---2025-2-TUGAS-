<?php

namespace Database\Seeders;

use App\Models\categories;
use App\Models\products;
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
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now()
                
            ],
            [
                'username' => 'user1',
                'password' => bcrypt('user123'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'username' => 'user2',
                'password' => bcrypt('user123'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        DB::table('categories')->insert([
            [
                'id_category' => 1,
                'name' => 'Electronics',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_category' => 2,
                'name' => 'Gaming',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_category' => 3,
                'name' => 'Aksesoris',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        DB::table('products')->insert([
            [
                'id_product' => 1,
                'name' => 'Laptop Gaming',
                'description' => 'Laptop gaming dengan spesifikasi tinggi',
                'price' => 15000000,
                'stock' => 10,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_product' => 2,
                'name' => 'Headset Gaming',
                'description' => 'Headset gaming dengan suara jernih',
                'price' => 500000,
                'stock' => 20,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_product' => 3,
                'name' => 'Mouse Gaming',
                'description' => 'Mouse gaming dengan desain ergonomis',
                'price' => 300000,
                'stock' => 15,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        DB::table('category_products')->insert([
            [
                'id_category' => 1,
                'id_product' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_category' => 2,
                'id_product' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_category' => 2,
                'id_product' => 2,
                'created_at' => now(),
                'updated_at' => now()   
            ],
            [
                'id_category' => 2,
                'id_product' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_category' => 3,
                'id_product' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_category' => 3,
                'id_product' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
