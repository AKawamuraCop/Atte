<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimeRecordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $param = [
            'user_id' => '1',
            'category_id' => '1',
            'clock_in' => '2024-08-05 08:00:00'
        ];
        DB::table('time_records')->insert($param);
        $param = [
            'user_id' => '1',
            'category_id' => '2',
            'clock_in' => '2024-08-05 17:00:00'
        ];
        DB::table('time_records')->insert($param);
        $param = [
            'user_id' => '1',
            'category_id' => '3',
            'clock_in' => '2024-08-05 12:00:00'
        ];
        DB::table('time_records')->insert($param);
        $param = [
            'user_id' => '1',
            'category_id' => '4',
            'clock_in' => '2024-08-05 13:00:00'
        ];
        DB::table('time_records')->insert($param);
        $param = [
            'user_id' => '1',
            'category_id' => '3',
            'clock_in' => '2024-08-05 15:00:00'
        ];
        DB::table('time_records')->insert($param);
        $param = [
            'user_id' => '1',
            'category_id' => '4',
            'clock_in' => '2024-08-05 15:15:00'
        ];
        DB::table('time_records')->insert($param);
        $param = [
            'user_id' => '2',
            'category_id' => '1',
            'clock_in' => '2024-08-05 08:30:00'
        ];
        DB::table('time_records')->insert($param);
        $param = [
            'user_id' => '2',
            'category_id' => '2',
            'clock_in' => '2024-08-05 16:00:00'
        ];
        DB::table('time_records')->insert($param);
        $param = [
            'user_id' => '2',
            'category_id' => '3',
            'clock_in' => '2024-08-05 12:15:00'
        ];
        DB::table('time_records')->insert($param);
        $param = [
            'user_id' => '2',
            'category_id' => '4',
            'clock_in' => '2024-08-05 13:00:00'
        ];
        DB::table('time_records')->insert($param);
        $param = [
            'user_id' => '3',
            'category_id' => '1',
            'clock_in' => '2024-08-02 08:00:00'
        ];
        DB::table('time_records')->insert($param);
        $param = [
            'user_id' => '3',
            'category_id' => '2',
            'clock_in' => '2024-08-02 18:00:00'
        ];
        DB::table('time_records')->insert($param);
        $param = [
            'user_id' => '3',
            'category_id' => '3',
            'clock_in' => '2024-08-02 11:30:00'
        ];
        DB::table('time_records')->insert($param);
        $param = [
            'user_id' => '3',
            'category_id' => '4',
            'clock_in' => '2024-08-02 12:10:00'
        ];
        DB::table('time_records')->insert($param);
        $param = [
            'user_id' => '3',
            'category_id' => '3',
            'clock_in' => '2024-08-02 15:00:00'
        ];
        DB::table('time_records')->insert($param);
        $param = [
            'user_id' => '3',
            'category_id' => '4',
            'clock_in' => '2024-08-02 15:15:00'
        ];
        DB::table('time_records')->insert($param);
        $param = [
            'user_id' => '4',
            'category_id' => '1',
            'clock_in' => '2024-08-02 10:00:00'
        ];
        DB::table('time_records')->insert($param);
        $param = [
            'user_id' => '4',
            'category_id' => '3',
            'clock_in' => '2024-08-02 12:00:00'
        ];
        DB::table('time_records')->insert($param);
    }
}
