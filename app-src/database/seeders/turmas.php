<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class turmas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('class')->insert([
            'class_name' => 'TPSI',
            'course_id' => '1',
            'class_startdate'=>'4 de out',
            'class_enddate'=>'15 de out',
            'class_school'=>'Palmela',
            'class_coordinator'=>'1',
        ]);
    }
}
