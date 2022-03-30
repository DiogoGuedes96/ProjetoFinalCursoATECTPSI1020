<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class evaluation_comment extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('evaluation_comment')->insert([
            'evaluation_comment_text' => 'Placeholder text.',
            'evaluator_user_id' => '2',
            'evaluated_user_id' => '4',
            'task_id' => '1',
        ]);
    }
}
