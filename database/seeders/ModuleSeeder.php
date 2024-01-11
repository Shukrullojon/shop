<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lists = [
            [
                'name' => '1 - module',
                'status' => 1,
            ],
            [
                'name' => '2 - module',
                'status' => 1,
            ],
            [
                'name' => '3 - module',
                'status' => 1,
            ],
            [
                'name' => '4 - module',
                'status' => 1,
            ],
            [
                'name' => '5 - module',
                'status' => 1,
            ],
            [
                'name' => '6 - module',
                'status' => 1,
            ],
        ];
        foreach ($lists as $list){
            Module::create($list);
        }
    }
}
