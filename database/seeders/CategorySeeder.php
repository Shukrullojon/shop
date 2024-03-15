<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cat = Category::create([
            'name' => "Bluzkalar va rubashkalar",
            'parent_id' => 0,
            'status' => 1,
        ]);
        Category::create([
            'name' => "Bluzkalar",
            'parent_id' => $cat->id,
            'status' => 1,
        ]);
        Category::create([
            'name' => "Rubashkalar",
            'parent_id' => $cat->id,
            'status' => 1,
        ]);
        $cat = Category::create([
            'name' => "Futbolkalar va polo",
            'parent_id' => 0,
            'status' => 1,
        ]);
        Category::create([
            'name' => "Futbolkalar",
            'parent_id' => $cat->id,
            'status' => 1,
        ]);
        Category::create([
            'name' => "Polo",
            'parent_id' => $cat->id,
            'status' => 1,
        ]);
        Category::create([
            'name' => "Sport futbolkalari",
            'parent_id' => $cat->id,
            'status' => 1,
        ]);
        $cat = Category::create([
            'name' => "Jinsilar",
            'parent_id' => 0,
            'status' => 1,
        ]);
        Category::create([
            'name' => "Boyfriend jimsi shimlar",
            'parent_id' => $cat->id,
            'status' => 1,
        ]);
        Category::create([
            'name' => "Jeggingslar",
            'parent_id' => $cat->id,
            'status' => 1,
        ]);
        Category::create([
            'name' => "Tekis jinsilar",
            'parent_id' => $cat->id,
            'status' => 1,
        ]);
        Category::create([
            'name' => "Toraytirilgan jinsilar",
            'parent_id' => $cat->id,
            'status' => 1,
        ]);
    }
}
