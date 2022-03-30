<?php

namespace Database\Seeders;

use App\Models\Ufcd as ModelsUfcd;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ufcd extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ufcd')->insert([
            'ufcd_number' => '5062',
            'ufcd_name' => 'Lingua portuguesa',
        ]);
        DB::table('ufcd')->insert([
            'ufcd_number' => '5063',
            'ufcd_name' => 'Lingua inglesa',
        ]);
        DB::table('ufcd')->insert([
            'ufcd_number' => '5064',
            'ufcd_name' => 'Matemática',
        ]);
        DB::table('ufcd')->insert([
            'ufcd_number' => '5098',
            'ufcd_name' => 'Arquitetura de hardware',
        ]);
        DB::table('ufcd')->insert([
            'ufcd_number' => '5407',
            'ufcd_name' => 'Sistemas de informação - Fundamentos',
        ]);
        DB::table('ufcd')->insert([
            'ufcd_number' => '5408',
            'ufcd_name' => 'Sistemas de informação - Conceção',
        ]);
        DB::table('ufcd')->insert([
            'ufcd_number' => '5409',
            'ufcd_name' => 'Engenharia de software',
        ]);
        DB::table('ufcd')->insert([
            'ufcd_number' => '5089',
            'ufcd_name' => 'Programação em SQL',
        ]);
        DB::table('ufcd')->insert([
            'ufcd_number' => '5413',
            'ufcd_name' => 'Programação de computadores - Orientada a objetos',
        ]);
    }
}
