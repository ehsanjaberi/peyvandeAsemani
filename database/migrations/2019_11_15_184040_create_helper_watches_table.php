<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHelperWatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('helper_watches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('national_code',10)->index();
            $table->foreign('national_code')->references('national_code')->on('helpers');
            $table->string('entrance_time',8);
            $table->string('exit_time',8);
            $table->string('date',10);
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
        Schema::dropIfExists('helper_watches');
    }
}
