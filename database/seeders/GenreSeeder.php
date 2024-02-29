<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = [
            ['genre' => '花・植物 flower plant '],
            ['genre' => 'ビジネス business'],
            ['genre' => '人物 people'],
            ['genre' => '動物・生き物 animal fish'],
            ['genre' => '乗り物 vehicle'],
            ['genre' => '生活 life'],
            ['genre' => '食べ物 food'],
            ['genre' => '春 spring'],
            ['genre' => '夏 summer'],
            ['genre' => '秋 fall'],
            ['genre' => '冬 winter'],
            ['genre' => '背景・壁紙 wallpaper'],
            ['genre' => 'アイコン icon'],
            ['genre' => '文字 letter'],
            ['genre' => '犬 dog'],
            ['genre' => '猫 cat'],
            ['genre' => '可愛い動物 cute animals'],
            ['genre' => '鳥 bird'],
            ['genre' => '学校 school'],
            ['genre' => 'おやつ snack candy'],
            ['genre' => '家庭 home'],
            ['genre' => '家族 family'],
            ['genre' => '桜 cherryblossom'],
            ['genre' => '車 car'],
            ['genre' => '電車 train'],
            ['genre' => '船 ship'],
            ['genre' => '顔 face'],
            ['genre' => '笑顔 smile'],
            ['genre' => '怒る angry'],
            ['genre' => '泣く cry'],
            ['genre' => 'その他 etc'],
        ];
        DB::table('genres')->insert($genres);    }   
    }
