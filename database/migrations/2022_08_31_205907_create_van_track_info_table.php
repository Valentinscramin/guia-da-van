<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVanTrackInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('van_track_info', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cidade_saida')->unsigned();
            $table->foreign('cidade_saida')->references('id')->on('cities');
            $table->integer('cidade_chegada')->unsigned()->nullable();
            $table->foreign('cidade_chegada')->references('id')->on('cities');
            $table->string('escola')->nullable();
            $table->string('periodo')->nullable();
            $table->string('evento')->nullable();
            $table->integer('van_track_id')->unsigned();
            $table->foreign('van_track_id')->references('id')->on('van_track')
                ->onDelete('cascade');
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
        Schema::dropIfExists('van_track_info');
    }
}
