<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(ModuleSeeder::class);
        $this->call(DaySeeder::class);
        $this->call(PointSeeder::class);
        $this->call(VocabularySeeder::class);
        $this->call(GrammerSeeder::class);
        $this->call(EventSeeder::class);
    }
}
