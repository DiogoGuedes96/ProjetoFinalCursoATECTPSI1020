<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class user_has_profiles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_has_profile')->insert([
            'user_id' => '1',
            'profile_id' => '3'
        ]);
        DB::table('user_has_profile')->insert([
            'user_id' => '1',
            'profile_id' => '2'
        ]);
        DB::table('user_has_profile')->insert([
            'user_id' => '2',
            'profile_id' => '1'
        ]);
        DB::table('user_has_profile')->insert([
            'user_id' => '4',
            'profile_id' => '1'
        ]);
        DB::table('user_has_profile')->insert([
            'user_id' => '5',
            'profile_id' => '3'
        ]);
        for ($c = 1; $c<5;$c++)
        {
            DB::table('user_has_profile')->insert([
                'user_id' => 6,
                'profile_id' => $c
            ]);
        }
    }
}
