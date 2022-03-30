<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class admin_criteria_general extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_criteria_general')->insert([
            'admin_criteria_name' => 'Criterio 1',
            'admin_criteria_text' => 'blablabla',
            'admin_criteria_scale_type' => '1',
        ]);
        DB::table('admin_criteria_general')->insert([
            'admin_criteria_name' => 'Criterio 2',
            'admin_criteria_text' => 'blablableh',
            'admin_criteria_scale_type' => '2',
        ]);
        DB::table('admin_criteria_general')->insert([
            'admin_criteria_name' => 'Criterio 3',
            'admin_criteria_text' => 'blablablih',
            'admin_criteria_scale_type' => '3',
        ]);
        DB::table('admin_criteria_general')->insert([
            'admin_criteria_name' => 'Criterio 4',
            'admin_criteria_text' => 'blablabluh',
            'admin_criteria_scale_type' => '4',
        ]);
    }
}
