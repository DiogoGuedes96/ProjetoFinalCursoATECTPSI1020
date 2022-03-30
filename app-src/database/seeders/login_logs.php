<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class login_logs extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('class_ufcd')->insert([
            'user_id' => '1',
            'event_log' => 'Login',
            'event_datetime' => '????', //DATETIME ?
        ]);
    }
}
