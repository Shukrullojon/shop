<?php

namespace Database\Seeders;

use App\Models\Ball;
use App\Models\Category;
use App\Models\Day;
use App\Models\Media;
use App\Models\Result;
use App\Models\User;
use App\Models\Vocabulary;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class VocabularySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 5000; $i++) {
            $voc = Vocabulary::create([
                'name' => Str::random(15),
                'description' => Str::random(150),
                'status' => 1,
                'day_id' => Day::select('id')->inRandomOrder()->first()->id,
            ]);
            Media::create([
                'model' => Vocabulary::class,
                'model_id' => $voc->id,
                'data' => 'image.jpeg',
                'type' => 1,
                'status' => 1,
            ]);
            Media::create([
                'model' => Vocabulary::class,
                'model_id' => $voc->id,
                'data' => 'audio.mp3',
                'type' => 2,
                'status' => 1,
            ]);

            $ball = Ball::create([
                'model' => Day::class,
                'model_id' => $voc->day_id,
                'table' => Vocabulary::class,
                'scores' => rand(10, 20),
                'coins' => rand(10, 20),
            ]);

            Result::create([
                'model' => Day::class,
                'model_id' => $voc->day_id,
                'table' => Vocabulary::class,
                'user_id' => User::select('id')->inRandomOrder()->first()->id,
                'is_done' => rand(0, 1),
                'scores' => $ball->scores,
                'coins' => $ball->coins,
            ]);

        }
    }
}
