<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $param = [
            'content' => '勤務開始'
        ];
        DB::table('categories')->insert($param);

        $param = [
            'content' => '勤務終了'
        ];
        DB::table('categories')->insert($param);

        $param = [
            'content' => '休憩開始'
        ];
        DB::table('categories')->insert($param);

        $param = [
            'content' => '休憩終了'
        ];
        DB::table('categories')->insert($param);
    }
}
