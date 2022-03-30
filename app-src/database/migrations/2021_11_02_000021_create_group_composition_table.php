<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupCompositionTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'group_composition';

    /**
     * Run the migrations.
     * @table group_composition
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('group_id');
            $table->integer('user_id');
            $table->string('status',45);


            $table->index(["user_id"], 'fk_group_comp_user_id_idx');
            $table->index(["group_id"], 'fk_group_comp_group_id_idx');



            $table->foreign('user_id', 'fk_group_comp_user_id_idx')
                ->references('user_id')->on('user')
                ->onDelete('cascade')
                ->onUpdate('no action');


            $table->foreign('group_id', 'fk_group_comp_group_id_idx')
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
