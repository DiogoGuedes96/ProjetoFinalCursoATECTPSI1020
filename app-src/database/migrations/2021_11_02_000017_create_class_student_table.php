<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassStudentTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'class_student';

    /**
     * Run the migrations.
     * @table class_student
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('user_id');
            $table->integer('class_id');
            $table->timestamps();

            $table->index(["class_id"], 'fk_classstudent_class_id_idx');
            $table->index(["user_id"], 'fk_classstudent_user_id_idx');

            $table->foreign('user_id', 'fk_classstudent_user_id_idx')
                ->references('user_id')->on('user')
                ->onDelete('cascade')
                ->onUpdate('no action');

            $table->foreign('class_id', 'fk_classstudent_class_id_idx')
                ->references('class_id')->on('class')
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
