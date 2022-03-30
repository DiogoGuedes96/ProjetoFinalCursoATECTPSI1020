<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class course extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('course')->insert([
            'course_name' => 'Técnico Especialista de Programação de Sistemas Informáticos',
            'course_slug' => 'TPSI',
            'course_cet' => '5',
            'curriculum_id' => '1',
        ]);
    }
}
