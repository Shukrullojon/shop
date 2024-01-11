<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Media;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0; $i < 10; $i ++){
            $h = rand(10,100);
            $event = Event::create([
                'title' => "Meeting for Dreamers",
                'info' => "In this third person singular the verb always ends in -s: he wants, she needs, he gives, she thinks.",
                'date' => date("Y-m-d H:i:s", strtotime("+{$h} hours")),
                'status' => 1,
            ]);
            Media::create([
                'model' => Event::class,
                'model_id' => $event->id,
                'data' => 'image.jpeg',
                'type' => 1,
                'status' => 1,
            ]);
        }
    }
}
