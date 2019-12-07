<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('studies')->insert([
            ['title' => 'ابتدایی'],
            ['title' => 'دیپلم'],
            ['title' => 'فوق دیپلم'],
            ['title' => 'لیسانس'],
            ['title' => 'فوق لیسانس'],
            ['title' => 'دکترا'],
        ]);
    }
}
