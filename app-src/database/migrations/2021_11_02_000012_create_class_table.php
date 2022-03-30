<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'class';

    /**
     * Run the migrations.
     * @table class
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('class_id');
            $table->string('class_name', 45);
            $table->integer('course_id');
            $table->string('class_startdate', 45);
            $table->string('class_enddate', 45)->nullable();
            $table->string('class_school', 45);
            $table->integer('class_coordinator');
            $table->timestamps();

            $table->index(["course_id"], 'fk_class_course_id_idx');

            $table->index(["class_coordinator"], 'fk_class_teacher_id_idx');


            $table->foreign('course_id', 'fk_class_course_id_idx')
                ->references('course_id')->on('course')
                ->onDelete('cascade')
                ->onUpdate('no action');

            $table->foreign('class_coordinator', 'fk_class_teacher_id_idx')
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
