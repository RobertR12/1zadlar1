<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePretplatniciTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pretplatnici', function (Blueprint $table) {
            $table->increments('Id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('Id')->on('users');
            $table->decimal('Amount', 11,2);
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
        Schema::dropIfExists('pretplatnici');
    }
}
