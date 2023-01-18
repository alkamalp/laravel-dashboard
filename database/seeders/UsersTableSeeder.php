<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array(
            [
                'name' => 'Abdullah\' Muhammad',
                'email' => 'alkamalp@gmail.com',
                'password' => bcrypt('kamal23'),
                'foto' => 'user.png',
                'level' => 1
            ],
            [
                'name' => 'Hilya\' Zulfiah',
                'email' => 'hilya22@gmail.com',
                'password' => bcrypt('hilya22'),
                'foto' => 'user.png',
                'level' => 2
            ]
        ));
    }
}
