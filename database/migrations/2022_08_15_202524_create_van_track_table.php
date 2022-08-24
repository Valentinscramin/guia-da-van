<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVanTrackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('van_track', function (Blueprint $table) {
            $table->integer('track_id')->unsigned();
            $table->integer('van_id')->unsigned();
            $table->string('cidade_saida')->nullable();
            $table->string('cidade_chegada')->nullable();
            $table->string('escola')->nullable();
            $table->string('periodo')->nullable();
            $table->string('evento')->nullable();
            $table->unique(['track_id', 'van_id']);
            $table->foreign('track_id')->references('id')->on('track')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('van_id')->references('id')->on('van')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('van_track');
    }
}
