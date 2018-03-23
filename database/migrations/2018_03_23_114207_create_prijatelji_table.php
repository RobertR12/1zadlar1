<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrijateljiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prijatelji', function (Blueprint $table) {
            $table->increments('Id');
            $table->unsignedInteger('User_id');
            $table->foreign('User_id')->references('Id')->on('users');
            $table->unsignedInteger('Friend_id');
            $table->foreign('Friend_id')->references('Id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prijatelji');
    }
}
