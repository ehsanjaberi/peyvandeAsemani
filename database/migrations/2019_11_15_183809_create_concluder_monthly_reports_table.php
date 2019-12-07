<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConcluderMonthlyReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concluder_monthly_reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('national_code',10);
            $table->foreign('national_code')->references('national_code')->on('concluders');
            $table->unsignedTinyInteger('present_count_per_month')->default(0);
            $table->unsignedTinyInteger('this_month_weddings')->default(0);
            $table->unsignedTinyInteger('comments_count')->default(0);
            $table->string('total_hours',8)->default('00:00:00');
            $table->string('from',10);
            $table->string('to',10);
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
        Schema::dropIfExists('concluder_monthly_reports');
    }
}
