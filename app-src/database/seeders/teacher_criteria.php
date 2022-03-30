<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class teacher_criteria extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teacher_criteria')->insert([
            'teacher_criteria_name' => 'Criterio 1',
            'teacher_criteria_text' => 'blablabla',
            'teacher_criteria_scale_type' => '1',
            'teacher_criteria_user' => '1',
        ]);
        DB::table('teacher_criteria')->insert([
            'teacher_criteria_name' => 'Criterio 2',
            'teacher_criteria_text' => 'blablableh',
            'teacher_criteria_scale_type' => '2',
            'teacher_criteria_user' => '1',
        ]);
        DB::table('teacher_criteria')->insert([
            'teacher_criteria_name' => 'Criterio 3',
            'teacher_criteria_text' => 'blablablih',
            'teacher_criteria_scale_type' => '3',
            'teacher_criteria_user' => '1',
        ]);
        DB::table('teacher_criteria')->insert([
            'teacher_criteria_name' => 'Criterio 4',
            'teacher_criteria_text' => 'blablabluh',
            'teacher_criteria_scale_type' => '4',
            'teacher_criteria_user' => '1',
        ]);
    }
}
