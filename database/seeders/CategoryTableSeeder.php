<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Category::create(['name' => 'Laptopy']);
        Category::create(['name' => 'Telefon']);
        Category::create(['name' => 'Komputery']);
        Category::create(['name' => 'Telewizory']);
        Category::create(['name' => 'Gry']);
        Category::create(['name' => 'Aparaty']);
    }
}
