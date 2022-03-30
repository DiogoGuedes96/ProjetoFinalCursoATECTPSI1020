<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            users::class,
            ufcd::class,
            task_date::class,
            curriculum::class,
            curriculumUfcd::class,
            user_profiles::class,
            user_has_profiles::class,
            course::class,
            turmas::class,
            class_student::class,
            //login_logs::class, //{ Necessita rever o formato de dados}
            task::class,
            group::class,
            task_delivery::class,
            criteria_scale::class,
            teacher_criteria::class,
            class_ufcd::class,
            admin_criteria_course::class,
            admin_criteria_general::class,
            coordinator_criteria::class,
            task_criteria::class,
            group_composition::class,
            evaluation_comment::class,
            final_evaluation::class,
            criteria_evaluation::class,
        ]);
    }
}
