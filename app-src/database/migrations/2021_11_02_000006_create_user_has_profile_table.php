<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserHasProfileTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'user_has_profile';

    /**
     * Run the migrations.
     * @table user_has_profile
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('user_id');
            $table->integer('profile_id');
            $table->timestamps();

            $table->index(["profile_id"], 'fk_profile_type_idx');
            $table->index(["user_id"], 'fk_user_id_idx');

            $table->foreign('user_id', 'fk_user_id_idx')
                ->references('user_id')->on('user')
                ->onDelete('cascade')
                ->onUpdate('no action');

            $table->foreign('profile_id', 'fk_profile_type_idx')
                ->references('profile_id')->on('user_profile')
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
