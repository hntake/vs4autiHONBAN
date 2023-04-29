<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class LostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
  DB::table('losts')->insert([
            'email' => 'momoko34@example.com',
            'password' =>  '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'uuid'=>'7debe5d6-cc0b-30a0-94ad-2535728e4d5d',
            'tel1'=>'110',
            'name'=>'name',
            'name_pronunciation'=>'yomi',

        ]);    }
}
