<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskCriteriaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'task_criteria';

    /**
     * Run the migrations.
     * @table task_criteria
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('task_criteria_id');
            $table->integer('task_id');
            $table->integer('task_criteria_weight');
            $table->integer('task_criteria_scale_dimension');
            $table->integer('task_criteria_scale_type');
            $table->string('task_criteria_type', 45);
            $table->integer('task_criteria_type_id');
            $table->string('task_criteria_name', 100);
            $table->string('task_criteria_text');
            $table->timestamps();
            
            $table->index(["task_id"], 'fk_task_criteria_task_id_idx');

            $table->index(["task_criteria_scale_type"], 'fk_task_criteria_scale_idx');


            $table->foreign('task_id', 'fk_task_criteria_task_id_idx')
                ->references('task_id')->on('task')
                ->onDelete('cascade')
                ->onUpdate('no action');

            $table->foreign('task_criteria_scale_type', 'fk_task_criteria_scale_idx')
                ->references('scale_id')->on('criteria_scale')
                ->onDelete('no action')
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
        Schema::dropIfExists($this->tableName);
    }
}
