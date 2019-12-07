<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WeekDaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $days = [
            ['name' => 'شنبه'],
            ['name' => 'یک شنبه'],
            ['name' => 'دوشنبه'],
            ['name' => 'سه شنبه'],
            ['name' => 'چهارشنبه'],
            ['name' => 'پنج شنبه'],
            ['name' => 'جمعه'],
            ['name' => 'هر روز'],
        ];
        DB::table('week_days')->insert($days);
    }
}
