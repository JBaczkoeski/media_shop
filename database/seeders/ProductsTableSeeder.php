<?php

namespace Database\Seeders;

use App\Models\Product;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        $categoryIds = \App\Models\Category::pluck('id')->toArray();
        $brandIds = \App\Models\Brand::pluck('id')->toArray();

        for ($i = 0; $i < 50; $i++) {
            Product::create([
                'name' => $faker->word,
                'description' => $faker->paragraph,
                'price' => $faker->randomFloat(2, 1, 10000),
                'category_id' => $faker->randomElement($categoryIds),
                'brand_id' => $faker->randomElement($brandIds),
                'image_src' => $faker->imageUrl(640, 480, 'technics '),
                'archived' => 0,
            ]);
        }
    }
}
