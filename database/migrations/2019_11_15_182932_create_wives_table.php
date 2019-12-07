<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wives', function (Blueprint $table) {
            $table->string('national_code',10);
            $table->string('first_name',15);
            $table->string('last_name',15);
            $table->string('father_national_code',10);
            $table->string('father_first_name',15);
            $table->string('father_last_name',15);
            $table->unsignedTinyInteger('study_id');
            $table->foreign('study_id')->references('id')->on('studies');
            $table->unsignedMediumInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->primary('national_code');
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wives');
    }
}
