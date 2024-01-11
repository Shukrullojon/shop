<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Rustam',
                'email' => 'rustam@gmail.com',
                'phone' => '996297725',
                'password' => Hash::make('1272256a'),
                //'token' => Str::uuid(),
                'status' => 1
            ],
            [
                'name' => 'Shukrullo',
                'email' => 'shukrullobk@gmail.com',
                'phone' => '993011798',
                'password' => Hash::make('1272256a'),
                //'token' => Str::uuid(),
                'status' => 1
            ],
            [
                'name' => 'Shukrullo3',
                'email' => 'shukrullobk3@gmail.com',
                'phone' => '993011799',
                'password' => Hash::make('1272256a'),
                //'token' => Str::uuid(),
                'status' => 1
            ],
            [
                'name' => 'Shukrullo4',
                'email' => 'shukrullobk4@gmail.com',
                'phone' => '993011888',
                'password' => Hash::make('1a72256a'),
                'status' => 1
            ],
            [
                'name' => 'Shukrullo5',
                'email' => 'shukrullobk5@gmail.com',
                'phone' => '993011000',
                'password' => Hash::make('1272250a'),
                'status' => 1
            ],
        ];

        foreach ($data as $d){
            User::create($d);
        }
    }
}
