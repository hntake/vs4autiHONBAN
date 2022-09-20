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
            ['pic_name' => 'd_apron2.jpg'],
            ['pic_name' => 'd_anes.jpg'],
            ['pic_name' => 'd_bite.jpg'],
            ['pic_name' => 'd_bite2.jpg'],
            ['pic_name' => 'd_cement.jpg'],
            ['pic_name' => 'd_compress.jpg'],
            ['pic_name' => 'd_cotton.jpg'],
            ['pic_name' => 'd_dy.jpg'],
            ['pic_name' => 'd_ee.jpg'],
            ['pic_name' => 'd_emr.jpg'],
            ['pic_name' => 'd_engine.jpg'],
            ['pic_name' => 'd_gutta.jpg'],
            ['pic_name' => 'd_impress.jpg'],
            ['pic_name' => 'd_impress2.jpg'],
            ['pic_name' => 'd_liedownjpg.jpg'],
            ['pic_name' => 'd_light.jpg'],
            ['pic_name' => 'd_light2.jpg'],
            ['pic_name' => 'd_metal.jpg'],
            ['pic_name' => 'd_mirror.jpg'],
            ['pic_name' => 'd_off.jpg'],
            ['pic_name' => 'd_openmouth.jpg'],
            ['pic_name' => 'd_opentool.jpg'],
            ['pic_name' => 'd_plug.jpg'],
            ['pic_name' => 'd_pmtc.jpg'],
            ['pic_name' => 'd_polish.jpg'],
            ['pic_name' => 'd_polish2.jpg'],
            ['pic_name' => 'd_probe.jpg'],
            ['pic_name' => 'd_reamer.jpg'],
            ['pic_name' => 'd_redbrush.jpg'],
            ['pic_name' => 'd_redpaper.jpg'],
            ['pic_name' => 'd_redpaper2.jpg'],
            ['pic_name' => 'd_resin.jpg'],
            ['pic_name' => 'd_root_clean.jpg'],
            ['pic_name' => 'd_root_spread.jpg'],
            ['pic_name' => 'd_rubberdum.jpg'],
            ['pic_name' => 'floth.jpg'],
            ['pic_name' => 'd_scaling.jpg'],
            ['pic_name' => 'd_sit.jpg'],
            ['pic_name' => 'd_spread.jpg'],
            ['pic_name' => 'd_spread_anes.jpg'],
            ['pic_name' => 'd_tarbin.jpg'],
            ['pic_name' => 'd_tek.jpg'],
            ['pic_name' => 'd_tek2.jpg'],
            ['pic_name' => 'd_toffle.jpg'],
            ['pic_name' => 'd_vacume.jpg'],
            ['pic_name' => 'd_vacume_water.jpg'],
            ['pic_name' => 'd_watte.jpg'],
            ['pic_name' => 'd_xray1.jpg'],
            ['pic_name' => 'd_xray2.jpg'],
            ['pic_name' => 'd_yodo.jpg'],
            ['pic_name' => 'flouride.jpg'],
            ['pic_name' => 'poo.jpg'],

        ];
        DB::table('images')->insert($images);

    }
}
