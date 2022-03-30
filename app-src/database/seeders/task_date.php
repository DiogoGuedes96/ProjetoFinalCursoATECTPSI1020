<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class task_date extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('task_date')->insert([
            'task_date_start' => '16:00 15/11/2021',
            'task_date_due' => '16:00 15/11/2021',
            'task_date_due_avaliation' => '16:00 15/11/2021',

        ]);
    }
}
