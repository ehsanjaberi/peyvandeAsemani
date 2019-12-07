<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeddingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weddings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('concluder_national_code',10);
            $table->foreign('concluder_national_code')->references('national_code')->on('concluders');
            $table->string('husband_national_code',10);
            $table->foreign('husband_national_code')->references('national_code')->on('husbands');
            $table->string('wife_national_code',10);
            $table->foreign('wife_national_code')->references('national_code')->on('wives');
            $table->unsignedTinyInteger('station_id');
            $table->foreign('station_id')->references('id')->on('stations');
            $table->string('mahriyeh',13)->default('0');
            $table->unsignedTinyInteger('wedding_start_hour')->default(0);
            $table->unsignedTinyInteger('wedding_start_minute')->default(0);
            $table->unsignedTinyInteger('wedding_start_second')->default(0);
            $table->unsignedTinyInteger('wedding_end_hour')->default(0);
            $table->unsignedTinyInteger('wedding_end_minute')->default(0);
            $table->unsignedTinyInteger('wedding_end_second')->default(0);
            $table->unsignedMediumInteger('wedding_year')->default(0);
            $table->unsignedTinyInteger('wedding_month')->default(0);
            $table->unsignedTinyInteger('wedding_day')->default(0);
            $table->text('comments');
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
        Schema::dropIfExists('weddings');
    }
}
