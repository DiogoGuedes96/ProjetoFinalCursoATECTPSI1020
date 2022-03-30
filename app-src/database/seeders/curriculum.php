<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class curriculum extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('curriculum')->insert([
            'curriculum_name' => 'Programação',
        ]);
        DB::table('curriculum')->insert([
            'curriculum_name' => 'Gestão de redes',
        ]);
    }
}
