<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskDeliveryTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'task_delivery';

    /**
     * Run the migrations.
     * @table task_delivery
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('delivery_id');
            $table->integer('task_id');
            $table->integer('group_id');
            $table->string('delivery_date', 45);
            $table->string('delivery_file', 45);
            $table->string('delivery_description', 45);
            $table->string('delivery_username', 45);
            $table->timestamps();

            $table->index(["task_id"], 'fk_delivery_task_id_idx');

            $table->index(["group_id"], 'fk_delivery_group_id_idx');


            $table->foreign('task_id', 'fk_delivery_task_id_idx')
                ->references('task_id')->on('task')
                ->onDelete('cascade')
                ->onUpdate('no action');

            $table->foreign('group_id', 'fk_delivery_group_id_idx')
                ->references('group_id')->on('group')
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
