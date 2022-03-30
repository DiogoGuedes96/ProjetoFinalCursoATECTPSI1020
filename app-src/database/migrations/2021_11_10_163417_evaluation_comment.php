<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EvaluationComment extends Migration
{
    /**
    * Schema table name to migrate
    * @var string
    */
   public $tableName = 'evaluation_comment';

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
           $table->increments('evaluation_comment_id');
           $table->string('evaluation_comment_text', 500)->nullable();
           $table->integer('evaluator_user_id')->nullable();
           $table->integer('evaluated_user_id')->nullable();
           $table->string('task_id', 45)->nullable();
           $table->timestamps();

           $table->index(["evaluator_user_id"], 'fk_evaluation_comment_evaluator_id_idx');
           $table->index(["evaluated_user_id"], 'fk_evaluation_comment_evaluated_id_idx');


           $table->foreign('evaluator_user_id', 'fk_fevaluation_comment_evaluator_id_idx')
               ->references('user_id')->on('user')
               ->onDelete('cascade')
               ->onUpdate('no action');


           $table->foreign('evaluated_user_id', 'fk_evaluation_comment_evaluated_id_idx')
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
        //
    }
}
