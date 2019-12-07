<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HelperTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ['title' => 'پذیرش'],
            ['title' => 'کنترل کننده'],
            ['title' => 'گشت و نظارت'],
            ['title' => 'معرف عاقدان'],
        ];
        DB::table('helper_types')->insert($types);
    }
}
