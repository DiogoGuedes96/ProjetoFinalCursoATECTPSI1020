<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurriculumUfcdTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'curriculum_ufcd';

    /**
     * Run the migrations.
     * @table curriculum_ufcd
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('curriculum_id');
            $table->string('ufcd_number', 45);
            $table->timestamps();

            $table->index(["ufcd_number"], 'fk_curriculum_ufcd_number_idx');
            $table->index(["curriculum_id"], 'fk_curriculum_id_idx');
            
            $table->foreign('curriculum_id', 'fk_curriculum_id_idx')
                ->references('curriculum_id')->on('curriculum')
                ->onDelete('cascade')
                ->onUpdate('no action');

            $table->foreign('ufcd_number', 'fk_curriculum_ufcd_number_idx')
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
