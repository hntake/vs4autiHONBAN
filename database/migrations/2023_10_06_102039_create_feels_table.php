<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feels', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('message1')->nullable();
            $table->string('message2')->nullable();
            $table->string('message3')->nullable();
            $table->string('message4')->nullable();
            $table->string('message5')->nullable();
            $table->string('message6')->nullable();
            $table->string('message7')->nullable();
            $table->string('message8')->nullable();
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
        Schema::dropIfExists('feels');
    }
};
