<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->unsignedTinyInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('subject',30);
            $table->string('message',255);
            $table->string('send_date',10);
            $table->boolean('is_read')->default(false);
            $table->tinyInteger('parent_id')->default(0);
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
        Schema::dropIfExists('messages');
    }
}
