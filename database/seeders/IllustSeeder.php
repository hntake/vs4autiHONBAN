<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class IllustSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images =[
            ['pic_name' => 'balance.jpg'],
            ['pic_name' => 'ball.jpeg'],
            ['pic_name' => 'block.jpeg'],
            ['pic_name' => 'ball.jpeg'],
            ['pic_name' => 'cooking.jpeg'],
            ['pic_name' => 'crayon.jpg'],
            ['pic_name' => 'lego.jpeg'],
            ['pic_name' => 'minicar.jpg'],
            ['pic_name' => 'origami.jpg'],
            ['pic_name' => 'puzzle.webp'],
            ['pic_name' => 'sand.jpeg'],
            ['pic_name' => 'swing.jpeg'],
            ['pic_name' => 'game_friends_kids_sueoki.png'],
            ['pic_name' => 'slide.jpeg'],
            ['pic_name' => 'toy_doll_house.png'],
            ['pic_name' => 'trike.jpeg'],
            ['pic_name' => 'ha_hamigaki_boy.png'],
            ['pic_name' => 'kid_kigae_boy.png'],
            ['pic_name' => 'kid_kigae_girl.png'],
            ['pic_name' => 'pose_silent_boy.png'],
            ['pic_name' => 'virus_hanareru_gyouretsu.png'],
            ['pic_name' => 'wash.png'],
            ['pic_name' => 'omocha_kataduke.png'],
            ['pic_name' => 'syokuji_boy.png'],
            ['pic_name' => 'syokuji_girl.png'],
            ['pic_name' => 'family_ofuro.png'],
            ['pic_name' => 'sleep_bed_woman.png'],
            ['pic_name' => 'bg_school.jpg'],
            ['pic_name' => 'youchien_tatemono.png'],
            ['pic_name' => 'bus_red_white.png'],
            ['pic_name' => 'car_green.png'],
            ['pic_name' => 'yagai_kyoushitsu_casual_walk.png'],
            ['pic_name' => 'haisya.png'],
            ['pic_name' => 'tatemono_byouin2.png'],
        ];
        DB::table('illusts')->insert($images);
    }
}
