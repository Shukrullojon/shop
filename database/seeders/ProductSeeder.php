<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 100; $i ++){
            $pr = Product::create([
                'name' => Str::length(20),
                'description' => Str::length(200),
                'price' => rand(100000,200000),
                'category_id' => Category::select('id')->inRandomOrder()->first()->id,
            ]);
            $image = Image::create([
                'model' => Product::class,
                'model_id' => $pr->id,
                'image' => ' ',
                'status' => 1,
            ]);
        }

    }
}
