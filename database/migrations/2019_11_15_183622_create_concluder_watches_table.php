<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConcluderWatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concluder_watches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('national_code',10);
            $table->foreign('national_code')->references('national_code')->on('concluders');
            $table->unsignedMediumInteger('concluder_entrance_year')->default(0);
            $table->unsignedTinyInteger('concluder_entrance_month')->default(0);
            $table->unsignedTinyInteger('concluder_entrance_day')->default(0);
            $table->unsignedTinyInteger('concluder_entrance_hour')->default(0);
            $table->unsignedTinyInteger('concluder_entrance_minute')->default(0);
            $table->unsignedTinyInteger('concluder_entrance_second')->default(0);
            $table->unsignedMediumInteger('concluder_exit_year')->default(0);
            $table->unsignedTinyInteger('concluder_exit_month')->default(0);
            $table->unsignedTinyInteger('concluder_exit_day')->default(0);
            $table->unsignedTinyInteger('concluder_exit_hour')->default(0);
            $table->unsignedTinyInteger('concluder_exit_minute')->default(0);
            $table->unsignedTinyInteger('concluder_exit_second')->default(0);
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
        Schema::dropIfExists('concluder_watches');
    }
}
