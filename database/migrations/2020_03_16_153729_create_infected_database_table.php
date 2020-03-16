<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfectedDatabaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infected_database', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('date');
            $table->unsignedInteger('infected');
            $table->unsignedInteger('sick');
            $table->unsignedInteger('recovered');
            $table->unsignedInteger('dead');
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
        Schema::dropIfExists('infected_database');
    }
}
