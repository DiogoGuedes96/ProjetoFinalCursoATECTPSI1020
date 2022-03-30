<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class criteria_scale extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('criteria_scale')->insert([
            'scale_name' => 'Concordância',
            'scale_maxlevel' => 'Concordo Totalmente',
            'scale_minlevel' => 'Discordo Totalmente',
            'scale_description' => 'Concordância',
        ]);
        DB::table('criteria_scale')->insert([
            'scale_name' => 'Importância',
            'scale_maxlevel' => 'Muito Importante',
            'scale_minlevel' => 'Pouco Importante',
            'scale_description' => 'Importância',
        ]);
        DB::table('criteria_scale')->insert([
            'scale_name' => 'Frequência',
            'scale_maxlevel' => 'Quase Sempre',
            'scale_minlevel' => 'Quase Nunca',
            'scale_description' => 'Frequência',
        ]);
        DB::table('criteria_scale')->insert([
            'scale_name' => 'Probabilidade',
            'scale_maxlevel' => 'Muito Provável',
            'scale_minlevel' => 'Pouco Provável',
            'scale_description' => 'Probabilidade',
        ]);
    }
}
