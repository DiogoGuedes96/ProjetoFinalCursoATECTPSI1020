<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class user_profiles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_profile')->insert([
            'profile_id' => '1',
            'profile_type' => 'Formando',
            'profile_dashboard' => 'studentsDashboard'
        ]);
        DB::table('user_profile')->insert([
            'profile_id' => '2',
            'profile_type' => 'Formador',
            'profile_dashboard' => 'teacherDashboard'
        ]);
        DB::table('user_profile')->insert([
            'profile_id' => '3',
            'profile_type' => 'Coordenador',
            'profile_dashboard' => 'coordinatorDashboard'
        ]);
        DB::table('user_profile')->insert([
            'profile_id' => '4',
            'profile_type' => 'Administrador',
            'profile_dashboard' => 'dashboardAdmin'
        ]);
    }
}
