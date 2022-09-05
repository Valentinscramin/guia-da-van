<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVanUserPhotoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('van_user_photo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('van_id')->unsigned();
            $table->foreign('van_id')->references('id')->on('van')
                ->onDelete('cascade');
            $table->integer('user_photo_id')->unsigned();
            $table->foreign('user_photo_id')->references('id')->on('user_photos')
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
        Schema::dropIfExists('van_user_photo');
    }
}
