<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHelperMonthlyReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('helper_monthly_reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('national_code',10);
            $table->foreign('national_code')->references('national_code')->on('helpers');
            $table->string('total_working_time',8)->default('00:00:00');
            $table->string('total_waste_time',8)->default('00:00:00');
            $table->unsignedTinyInteger('comments_count')->default(0);
            $table->string('from',10);
            $table->string('to',10);
        });
        schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('helper_monthly_reports');
    }
}
