<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeacherCriteriaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'teacher_criteria';

    /**
     * Run the migrations.
     * @table teacher_criteria
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('teacher_criteria_id');
            $table->string('teacher_criteria_name', 100);
            $table->string('teacher_criteria_text');
            $table->integer('teacher_criteria_scale_type');
            $table->integer('teacher_criteria_user');
            $table->timestamps();
            
            $table->index(["teacher_criteria_scale_type"], 'fk_teacher_criteria_type_idx');
            $table->index(["teacher_criteria_user"], 'fk_teacher_criteria_user_idx');

            $table->foreign('teacher_criteria_scale_type', 'fk_teacher_criteria_type_idx')
                ->references('scale_id')->on('criteria_scale')
                ->onDelete('cascade')
                ->onUpdate('no action');

            $table->foreign('teacher_criteria_user', 'fk_teacher_criteria_user_idx')
                ->references('user_id')->on('user')
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
        Schema::dropIfExists($this->tableName);
    }
}
