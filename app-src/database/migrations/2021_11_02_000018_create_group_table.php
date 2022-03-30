<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'group';

    /**
     * Run the migrations.
     * @table group
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('group_id');
            $table->string('group_name', 45);
            $table->integer('group_class');
            $table->integer('task_id');
            $table->timestamps();

            $table->index(["task_id"], 'fk_group_task_id_idx');

            $table->index(["group_class"], 'fk_group_class_id_idx');


            $table->foreign('task_id', 'fk_group_task_id_idx')
                ->references('task_id')->on('task')
                ->onDelete('cascade')
                ->onUpdate('no action');

            $table->foreign('group_class', 'fk_group_class_id_idx')
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
