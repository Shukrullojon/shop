<?php

namespace Database\Seeders;

use App\Models\Day;
use App\Models\Module;
use Illuminate\Database\Seeder;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modules = Module::all();
        foreach ($modules as $module){
            for ($i = 1; $i < 31; $i ++){
                Day::create([
                    'module_id' => $module->id,
                    'name' => "{$i} - day",
                    'status' => 1,
                ]);
            }
        }
    }
}
