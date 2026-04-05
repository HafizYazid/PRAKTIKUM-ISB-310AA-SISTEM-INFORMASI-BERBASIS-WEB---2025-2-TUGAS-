<?php

namespace Database\Seeders;

use App\Models\category;
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
        DB::table('categories')->insert([
            [
                'category_id' => 1,
                'category_name' => 'Supplements',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 2,
                'category_name' => 'Apparel',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 3,
                'category_name' => 'Equipment',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 4,
                'category_name' => 'Accessories',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);

        DB::table('brands')->insert([
            [
                'brand_id' => 1,
                'brand_name' => 'Optimum Nutrition',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'brand_id' => 2,
                'brand_name' => 'Nike',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'brand_id' => 3,
                'brand_name' => 'Rogue Fitness',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'brand_id' => 4,
                'brand_name' => 'Under Armour',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);

        DB::table('products')->insert([
            [
                'product_id' => 1,
                'category_id' => 1,
                'brand_id' => 1,
                'product_name' => 'Gold Standard Whey Protein',
                'product_price' => 500000,
                'product_stock' => 50,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'product_id' => 2,
                'category_id' => 1,
                'brand_id' => 1,
                'product_name' => 'Serious Mass Gainer',
                'product_price' => 600000,
                'product_stock' => 30,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'product_id' => 3,
                'category_id' => 1,
                'brand_id' => 1,
                'product_name' => 'Amino Energy',
                'product_price' => 400000,
                'product_stock' => 40,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'product_id' => 4,
                'category_id' => 2,
                'brand_id' => 2,
                'product_name' => 'Nike Pro T-Shirt',
                'product_price' => 300000,
                'product_stock' => 100,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'product_id' => 5,
                'category_id' => 2,
                'brand_id' => 2,
                'product_name' => 'Nike Pro Shorts',
                'product_price' => 350000,
                'product_stock' => 80,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'product_id' => 6,
                'category_id' => 2,
                'brand_id' => 2,
                'product_name' => 'Nike Pro Leggings',
                'product_price' => 400000,
                'product_stock' => 60,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'product_id' => 7,
                'category_id' => 3,
                'brand_id' => 3,
                'product_name' => 'Rogue Kettlebell',
                'product_price' => 700000,
                'product_stock' => 20,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'product_id' => 8,
                'category_id' => 3,
                'brand_id' => 3,
                'product_name' => 'Rogue Dumbbell Set',
                'product_price' => 1500000,
                'product_stock' => 10,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'product_id' => 9,
                'category_id' => 3,
                'brand_id' => 3,
                'product_name' => 'Rogue Power Rack',
                'product_price' => 5000000,
                'product_stock' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'product_id' => 10,
                'category_id' => 4,
                'brand_id' => 4,
                'product_name' => 'Under Armour Gym Bag',
                'product_price' => 800000,
                'product_stock' => 25,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'product_id' => 11,
                'category_id' => 4,
                'brand_id' => 4,
                'product_name' => 'Under Armour Water Bottle',
                'product_price' => 200000,
                'product_stock' => 100,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'product_id' => 12,
                'category_id' => 4,
                'brand_id' => 4,
                'product_name' => 'Under Armour Wrist Wraps',
                'product_price' => 150000,
                'product_stock' => 50,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
