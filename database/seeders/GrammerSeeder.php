<?php

namespace Database\Seeders;

use App\Models\Ball;
use App\Models\Day;
use App\Models\Grammer;
use App\Models\Media;
use App\Models\Result;
use App\Models\User;
use App\Models\Vocabulary;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class GrammerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $days = Day::all();
        foreach ($days as $day){
            $grammer = Grammer::create([
                'day_id' => $day->id,
                'name' => Str::random(20),
                'topic' => Str::random(20),
                'formula' => Str::random(20),
                'description' => Str::random(200),
                'status' => 1,
            ]);

            Media::create([
                'model' => Grammer::class,
                'model_id' => $grammer->id,
                'data' => 'video.mp4',
                'type' => 3,
                'status' => 1,
            ]);
            $ball = Ball::create([
                'model' => Day::class,
                'model_id' => $grammer->day_id,
                'table' => Grammer::class,
                'scores' => rand(10, 20),
                'coins' => rand(10, 20),
            ]);

            Result::create([
                'model' => Day::class,
                'model_id' => $grammer->day_id,
                'table' => Grammer::class,
                'user_id' => User::select('id')->inRandomOrder()->first()->id,
                'is_done' => rand(0, 1),
                'scores' => $ball->scores,
                'coins' => $ball->coins,
            ]);
        }
    }
}
