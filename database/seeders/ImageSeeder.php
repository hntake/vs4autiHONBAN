<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images =[
            ['image' => 'ball.png'],
            ['image' => 'bighouse.png'],
            ['image' => 'bus.png'],
            ['image' => 'car.png'],
            ['image' => 'classroom.png'],
            ['image' => 'cleaning.png'],
            ['image' => 'garagara.png'],
            ['image' => 'ground.png'],
            ['image' => 'house.png'],
            ['image' => 'lunch.png'],
            ['image' => 'nurse.png'],
            ['image' => 'park.png'],
            ['image' => 'phroom.png'],
            ['image' => 'quiet.png'],
            ['image' => 'shoesbox.png'],
            ['image' => 'sit.png'],
            ['image' => 'study.png'],
            ['image' => 'teeth.png'],
            ['image' => 'toilet.png'],
            ['image' => 'wash.png'],

        ];
        DB::table('images')->insert($images);

    }
}
