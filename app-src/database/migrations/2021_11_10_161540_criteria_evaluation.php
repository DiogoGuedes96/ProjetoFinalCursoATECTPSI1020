<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriteriaEvaluation extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'criteria_evaluation';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('criteria_evaluation_id');
            $table->integer('task_id')->nullable();
            $table->integer('task_criteria_id')->nullable();
            $table->integer('evaluator_user_id')->nullable();
            $table->integer('evaluated_user_id')->nullable();
            $table->integer('criteria_evaluation_grade')->nullable();
            $table->string('criteria_scale_type', 45)->nullable();
            $table->integer('criteria_evaluation_weight')->nullable();
            $table->timestamps();

            $table->index(["task_id"], 'fk_criteria_evaluation_task_id_idx');
            $table->index(["task_criteria_id"], 'fk_criteria_evaluation_task_criteria_id_idx');
            $table->index(["evaluated_user_id"], 'fk_criteria_evaluation_evaluated_user_id_idx');
            $table->index(["evaluator_user_id"], 'fk_criteria_evaluation_evaluator_user_id_idx');

            $table->foreign('evaluator_user_id', 'fk_criteria_evaluation_evaluator_user_id_idx')
                ->references('user_id')->on('user')
                ->onDelete('cascade')
                ->onUpdate('no action');

            $table->foreign('evaluated_user_id', 'fk_criteria_evaluation_evaluated_user_id_idx')
                ->references('user_id')->on('user')
                ->onDelete('cascade')
                ->onUpdate('no action');

            $table->foreign('task_id', 'fk_criteria_evaluation_task_id_idx')
                ->references('task_id')->on('task')
                ->onDelete('cascade')
                ->onUpdate('no action');

            $table->foreign('task_criteria_id', 'fk_criteria_evaluation_task_criteria_id_idx')
                ->references('task_criteria_id')->on('task_criteria')
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
