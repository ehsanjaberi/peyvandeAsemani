<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            'role_id' => 1,
            'username' => '3673519611',
            'password' => Hash::make('admin'),
            'last_login' => '0000/00/00',
            'last_logout' => '0000/00/00',
        ];
        DB::table('users')->insert($user);
    }
}
