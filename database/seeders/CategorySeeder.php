<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['category' => 'エイゴメ'],
            ['category' => 'IT2U'],
            ['category' => 'etc'],
            ['category' => 'サービス'],
            ['category' => 'メンテナンス'],
            ['category' => 'リリース'],
            ['category' => '自閉症全般'],
            ['category' => '発達障害全般'],
            ['category' => '管理人への質問・要望'],
            ['category' => '就学・学校関係'],
            ['category' => '医療・行政関係'],
            ['category' => '家族関係'],
            ['category' => 'おすすめ本・リンク・グッズ等'],
            ['category' => 'その他'],
        ];
        DB::table('categories')->insert($categories);    }
}
