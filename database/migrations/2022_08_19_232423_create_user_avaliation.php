<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAvaliation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_avaliation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('avaliation_id')->unsigned();
            $table->foreign('avaliation_id')->references('id')->on('avaliation')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->integer('create_user_id')->unsigned();
            $table->foreign('create_user_id')->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_avaliation');
    }
}
