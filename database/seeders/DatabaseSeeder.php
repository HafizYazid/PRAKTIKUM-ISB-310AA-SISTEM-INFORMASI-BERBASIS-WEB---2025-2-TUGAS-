<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use \Illuminate\Database\Console\Seeds\WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // =============================================
        // USERS — Admin & User Biasa
        // =============================================
        DB::table('users')->insert([
            [
                'name'              => 'Admin FitZone',
                'email'             => 'admin@fitzone.com',
                'password'          => Hash::make('password'),
                'role'              => 'admin',
                'profile_image'     => null,
                'email_verified_at' => now(),
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'name'              => 'Budi Santoso',
                'email'             => 'user@fitzone.com',
                'password'          => Hash::make('password'),
                'role'              => 'user',
                'profile_image'     => null,
                'email_verified_at' => now(),
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
        ]);

        // =============================================
        // CATEGORIES
        // =============================================
        DB::table('categories')->insert([
            [
                'category_id'   => 1,
                'category_name' => 'Supplements',
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'category_id'   => 2,
                'category_name' => 'Apparel',
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'category_id'   => 3,
                'category_name' => 'Equipment',
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'category_id'   => 4,
                'category_name' => 'Accessories',
                'created_at'    => now(),
                'updated_at'    => now()
            ],
        ]);

        // =============================================
        // BRANDS
        // =============================================
        DB::table('brands')->insert([
            [
                'brand_id'   => 1,
                'brand_name' => 'Optimum Nutrition',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'brand_id'   => 2,
                'brand_name' => 'Nike',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'brand_id'   => 3,
                'brand_name' => 'Rogue Fitness',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'brand_id'   => 4,
                'brand_name' => 'Under Armour',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);

        // =============================================
        // PRODUCTS
        // =============================================
        DB::table('products')->insert([
            [
                'product_id'    => 1,
                'category_id'   => 1,
                'brand_id'      => 1,
                'product_name'  => 'Gold Standard Whey Protein',
                'product_price' => 500000,
                'product_stock' => 50,
                'product_image' => null,
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'product_id'    => 2,
                'category_id'   => 1,
                'brand_id'      => 1,
                'product_name'  => 'Serious Mass Gainer',
                'product_price' => 600000,
                'product_stock' => 30,
                'product_image' => null,
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'product_id'    => 3,
                'category_id'   => 1,
                'brand_id'      => 1,
                'product_name'  => 'Amino Energy',
                'product_price' => 400000,
                'product_stock' => 40,
                'product_image' => null,
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'product_id'    => 4,
                'category_id'   => 2,
                'brand_id'      => 2,
                'product_name'  => 'Nike Pro T-Shirt',
                'product_price' => 300000,
                'product_stock' => 100,
                'product_image' => null,
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'product_id'    => 5,
                'category_id'   => 2,
                'brand_id'      => 2,
                'product_name'  => 'Nike Pro Shorts',
                'product_price' => 350000,
                'product_stock' => 80,
                'product_image' => null,
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'product_id'    => 6,
                'category_id'   => 2,
                'brand_id'      => 2,
                'product_name'  => 'Nike Pro Leggings',
                'product_price' => 400000,
                'product_stock' => 60,
                'product_image' => null,
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'product_id'    => 7,
                'category_id'   => 3,
                'brand_id'      => 3,
                'product_name'  => 'Rogue Kettlebell',
                'product_price' => 700000,
                'product_stock' => 20,
                'product_image' => null,
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'product_id'    => 8,
                'category_id'   => 3,
                'brand_id'      => 3,
                'product_name'  => 'Rogue Dumbbell Set',
                'product_price' => 1500000,
                'product_stock' => 10,
                'product_image' => null,
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'product_id'    => 9,
                'category_id'   => 3,
                'brand_id'      => 3,
                'product_name'  => 'Rogue Power Rack',
                'product_price' => 5000000,
                'product_stock' => 5,
                'product_image' => null,
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'product_id'    => 10,
                'category_id'   => 4,
                'brand_id'      => 4,
                'product_name'  => 'Under Armour Gym Bag',
                'product_price' => 800000,
                'product_stock' => 25,
                'product_image' => null,
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'product_id'    => 11,
                'category_id'   => 4,
                'brand_id'      => 4,
                'product_name'  => 'Under Armour Water Bottle',
                'product_price' => 200000,
                'product_stock' => 100,
                'product_image' => null,
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'product_id'    => 12,
                'category_id'   => 4,
                'brand_id'      => 4,
                'product_name'  => 'Under Armour Wrist Wraps',
                'product_price' => 150000,
                'product_stock' => 50,
                'product_image' => null,
                'created_at'    => now(),
                'updated_at'    => now()
            ],
        ]);
    }
}
