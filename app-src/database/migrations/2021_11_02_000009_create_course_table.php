<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'course';

    /**
     * Run the migrations.
     * @table course
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('course_id');
            $table->string('course_name', 45);
            $table->integer('curriculum_id');
            $table->string('course_slug',45);
            $table->string('course_cet',45);
            $table->timestamps();

            $table->index(["curriculum_id"], 'fk_course_curriculum_id_idx');


            $table->foreign('curriculum_id', 'fk_course_curriculum_id_idx')
                ->references('curriculum_id')->on('curriculum')
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
