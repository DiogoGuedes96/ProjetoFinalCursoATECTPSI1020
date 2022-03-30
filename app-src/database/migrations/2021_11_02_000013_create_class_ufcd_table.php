<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassUfcdTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'class_ufcd';

    /**
     * Run the migrations.
     * @table class_ufcd
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('teacher_id');
            $table->integer('class_id');
            $table->string('ufcd_id', 45);



            $table->index(["teacher_id"], 'fk_classufcd_teacher_idx');

            $table->index(["ufcd_id"], 'fk_classufcd_ufcd_idx');

            $table->index(["class_id"], 'fk_classufcd_class_id_idx');

            $table->foreign('teacher_id', 'fk_classufcd_teacher_idx')
            ->references('user_id')->on('user')
            ->onDelete('cascade')
            ->onUpdate('no action');

            $table->foreign('ufcd_id', 'fk_classufcd_ufcd_idx')
                ->references('ufcd_number')->on('ufcd')
                ->onDelete('cascade')
                ->onUpdate('no action');

            $table->foreign('class_id', 'fk_classufcd_class_id_idx')
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
