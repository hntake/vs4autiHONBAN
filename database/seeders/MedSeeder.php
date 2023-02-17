<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images =[
            ['pic_name' => 'counsel.jpeg'],
            ['pic_name' => 'ear.png'],
            ['pic_name' => 'hospital.jpeg'],   
            ['pic_name' => 'mouth.jpeg'],   
            ['pic_name' => 'mri.jpeg'],   
            ['pic_name' => 'nose.png'],   
            ['pic_name' => 'pressure.jpeg'],   
            ['pic_name' => 'scale.jpeg'],   
            ['pic_name' => 'shot.jpeg'],   
        ];
            DB::table('meds')->insert($images);
        }
}
