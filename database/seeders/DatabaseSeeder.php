<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
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
            'category_name' => 'Sneakers',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
            ],
            [
            'category_id' => 2, 
            'category_name' => 'Sports', 
            'created_at' => Carbon::now(), 
            'updated_at' => Carbon::now()
            ],
            [
            'category_id' => 3, 
            'category_name' => 'Slippers', 
            'created_at' => Carbon::now(), 
            'updated_at' => Carbon::now()
            ],
        ]);

        DB::table('products')->insert([
            [
            'product_id' => 1, 
            'category_id' => 1, 
            'product_name' => 'Nike Air Max', 
            'product_price' => 1500000, 
            'product_stock' => 10, 
            'created_at' => Carbon::now(), 
            'updated_at' => Carbon::now()
            ],
            [
            'product_id' => 2, 
            'category_id' => 2, 
            'product_name' => 'Adidas Ultraboost', 
            'product_price' => 2000000, 
            'product_stock' => 5, 
            'created_at' => Carbon::now(), 
            'updated_at' => Carbon::now()
            ],
            [
            'product_id' => 3, 
            'category_id' => 3, 
            'product_name' => 'Havaianas', 
            'product_price' => 300000, 
            'product_stock' => 20, 
            'created_at' => Carbon::now(), 
            'updated_at' => Carbon::now()
            ],
        ]);
    }
}
