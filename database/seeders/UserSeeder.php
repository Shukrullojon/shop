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
                'name' => 'Shukrullo',
                'email' => 'shukrullobk@gmail.com',
                'phone' => '993011798',
                'password' => Hash::make('12345678'),
                'token' => Str::uuid(),
                'status' => 1
            ],
        ];

        foreach ($data as $d){
            User::create($d);
        }
    }
}
