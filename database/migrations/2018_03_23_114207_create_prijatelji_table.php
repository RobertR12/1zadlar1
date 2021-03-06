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
        Schema::create('prijateljis', function (Blueprint $table) {
            $table->increments('Id');
            $table->unsignedInteger('User_id');
            $table->foreign('User_id')->references('Id')->on('users')->onDelete('cascade');
            $table->unsignedInteger('Friend_id');
            $table->foreign('Friend_id')->references('Id')->on('users')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prijateljis');
    }
}
