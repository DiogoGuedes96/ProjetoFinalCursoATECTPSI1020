<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoordinatorCriteriaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'coordinator_criteria';

    /**
     * Run the migrations.
     * @table coordinator_criteria
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('coordinator_criteria_id');
            $table->string('coordinator_criteria_name', 100);
            $table->string('coordinator_criteria_text');
            $table->integer('coordinator_criteria_scale_type');
            $table->integer('coordinator_criteria_class');
            $table->timestamps();

            $table->index(["coordinator_criteria_scale_type"], 'fk_coordinator_criteria_type_idx');

            $table->index(["coordinator_criteria_class"], 'fk_coordinator_criteria_class_idx');


            $table->foreign('coordinator_criteria_scale_type', 'fk_coordinator_criteria_type_idx')
                ->references('scale_id')->on('criteria_scale')
                ->onDelete('cascade')
                ->onUpdate('no action');

            $table->foreign('coordinator_criteria_class', 'fk_coordinator_criteria_class_idx')
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
