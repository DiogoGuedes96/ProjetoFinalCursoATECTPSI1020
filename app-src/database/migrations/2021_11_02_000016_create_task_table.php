<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'task';

    /**
     * Run the migrations.
     * @table task
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('task_id');
            $table->string('task_title', 45);
            $table->string('task_description', 45);
            $table->string('task_file', 1000)->nullable();
            $table->integer('task_date_id')->nullable();
            $table->string('task_status', 100);// "Unssigned"->Criada mas nao atribuida a ninguem | "Started"->atribuida | "Finished"->Entregue mas nao avalidada pelos alunos, | "Evaluated"->Entregue e avalaida pelos alunos
            $table->integer('task_class')->nullable();
            $table->string('task_ufcd', 45)->nullable();
            $table->integer('user_id');
            $table->string('task_teacher_status', 100); //"Yes"/"No" Ferifica se o professor ja avalaiou a task
            $table->timestamps();

            $table->index(["task_class"], 'fk_task_class_id_idx');
            $table->index(["task_date_id"], 'fk_task_date_id_idx');
            $table->index(["task_ufcd"], 'fk_task_ufcd_idx');
            $table->index(["user_id"], 'fk_task_user_id_idx');


            $table->foreign('task_class', 'fk_task_class_id_idx')
                ->references('class_id')->on('class')
                ->onDelete('cascade')
                ->onUpdate('no action');

            $table->foreign('task_date_id', 'fk_task_date_id_idx')
                ->references('task_date_id')->on('task_date')
                ->onDelete('cascade')
                ->onUpdate('no action');

            $table->foreign('user_id', 'fk_task_user_id_idx')
                ->references('user_id')->on('user')
                ->onDelete('cascade')
                ->onUpdate('no action');

            $table->foreign('task_ufcd', 'fk_task_ufcd_idx')
                ->references('ufcd_number')->on('ufcd')
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
