<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'user';

    /**
     * Run the migrations.
     * @table user
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('user_id');
            $table->string('user_name', 45);
            $table->string('email', 45);

            $table->string('password');
            $table->string('user_token', 45)->nullable();

            /*Alterado por Vitor Custódio*/
            //$table->string('user_image', 45)->nullable();
            $table->boolean('reset')->default(1); //Quanda há necessidade de mudar password
            $table->longText('user_image_base64')->nullable();
            $table->string('user365_id',64)->nullable();
            $table->string('user365_jobTitle')->nullable();
            /* Fim de Alteração*/

            $table->integer('user_rating')->nullable();
            $table->timestamps();

            $table->unique(["email"], 'user_mail_UNIQUE');
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
