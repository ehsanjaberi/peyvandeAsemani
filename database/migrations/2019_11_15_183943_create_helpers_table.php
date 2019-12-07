<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHelpersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('helpers', function (Blueprint $table) {
            $table->string('national_code',10);
            $table->string('first_name',15);
            $table->string('last_name',15);
            $table->string('mobile',11)->nullable();
            $table->unsignedTinyInteger('help_type');
            $table->foreign('help_type')->references('id')->on('helper_types');
            $table->unsignedTinyInteger('working_day');
            $table->foreign('working_day')->references('id')->on('week_days');
            $table->string('watch_time',8);
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
        Schema::dropIfExists('helpers');
    }
}
