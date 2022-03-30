<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FinalEvaluation extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'final_evaluation';

    /**
     * Run the migrations.
     * @table group_composition
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('final_evaluation_id');
            $table->integer('task_id')->nullable();
            $table->integer('student_id')->nullable();
            $table->integer('group_id')->nullable();
            $table->string('teacher_grade', 45)->nullable();
            $table->string('teacher_weight', 45)->nullable();
            $table->string('peer_grade', 45)->nullable();
            $table->string('peer_weight', 45)->nullable();
            $table->string('final_grade', 45)->nullable();
            $table->timestamps(); 

            $table->index(["task_id"], 'fk_final_evaluation_task_id_idx');
            $table->index(["student_id"], 'fk_final_evaluation_student_id_idx');
            $table->index(["group_id"], 'fk_final_evaluation_group_id_idx');


            $table->foreign('student_id', 'fk_final_evaluation_student_id_idx')
                ->references('user_id')->on('user')
                ->onDelete('cascade')
                ->onUpdate('no action');


            $table->foreign('group_id', 'fk_final_evaluation_group_id_idx')
            ->references('group_id')->on('group')
            ->onDelete('cascade')
            ->onUpdate('no action');

            $table->foreign('task_id', 'fk_final_evaluation_task_id_idx')
                ->references('task_id')->on('task')
                ->onDelete('cascade')
                ->onUpdate('no action');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
