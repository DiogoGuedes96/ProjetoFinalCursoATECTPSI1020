<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminCriteriaCourseTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'admin_criteria_course';

    /**
     * Run the migrations.
     * @table admin_criteria_course
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('admin_criteria_id');
            $table->string('admin_criteria_name', 100);
            $table->string('admin_criteria_text');
            $table->integer('admin_criteria_scale_type');
            $table->integer('admin_criteria_course');
            $table->timestamps();

            $table->index(["admin_criteria_scale_type"], 'fk_admin_criteria_course_type_idx');

            $table->index(["admin_criteria_course"], 'fk_admin_criteria_course_idx');


            $table->foreign('admin_criteria_scale_type', 'fk_admin_criteria_course_type_idx')
                ->references('scale_id')->on('criteria_scale')
                ->onDelete('cascade')
                ->onUpdate('no action');

            $table->foreign('admin_criteria_course', 'fk_admin_criteria_course_idx')
                ->references('course_id')->on('course')
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
