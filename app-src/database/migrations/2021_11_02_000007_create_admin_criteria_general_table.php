<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminCriteriaGeneralTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'admin_criteria_general';

    /**
     * Run the migrations.
     * @table admin_criteria_general
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
            $table->timestamps();

            $table->index(["admin_criteria_scale_type"], 'fk_admin_criteria_scale_idx');


            $table->foreign('admin_criteria_scale_type', 'fk_admin_criteria_scale_idx')
                ->references('scale_id')->on('criteria_scale')
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
