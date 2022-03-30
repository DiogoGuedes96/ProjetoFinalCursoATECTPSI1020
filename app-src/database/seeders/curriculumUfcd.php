<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class curriculumUfcd extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('curriculum_ufcd')->insert([
            'curriculum_id' => '1',
            'ufcd_number' => '5062'
        ]);
        DB::table('curriculum_ufcd')->insert([
            'curriculum_id' => '1',
            'ufcd_number' => '5063'
        ]);
        DB::table('curriculum_ufcd')->insert([
            'curriculum_id' => '1',
            'ufcd_number' => '5407'
        ]);
        DB::table('curriculum_ufcd')->insert([
            'curriculum_id' => '1',
            'ufcd_number' => '5413'
        ]);

        DB::table('curriculum_ufcd')->insert([
            'curriculum_id' => '2',
            'ufcd_number' => '5062'
        ]);
        DB::table('curriculum_ufcd')->insert([
            'curriculum_id' => '2',
            'ufcd_number' => '5063'
        ]);
        DB::table('curriculum_ufcd')->insert([
            'curriculum_id' => '2',
            'ufcd_number' => '5089'
        ]);
        DB::table('curriculum_ufcd')->insert([
            'curriculum_id' => '2',
            'ufcd_number' => '5408'
        ]);
    }
}
