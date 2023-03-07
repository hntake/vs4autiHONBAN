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
        Schema::create('independences', function (Blueprint $table) {
            $table->id();
            $table->string('schedule_name')->index();
            $table->string('user_id')->nullable();
            $table->string('public');
            $table->string('image1');
            $table->string('image2');
            $table->string('image3')->nullable();
            $table->string('image4')->nullable();
            $table->string('image5')->nullable();
            $table->string('explain1')->nullable();
            $table->string('explain2')->nullable();
            $table->string('explain3')->nullable();
            $table->string('explain4')->nullable();
            $table->string('explain5')->nullable();
            $table->string('caution1')->nullable();
            $table->string('caution2')->nullable();
            $table->string('caution3')->nullable();
            $table->string('caution4')->nullable();
            $table->string('caution5')->nullable();
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
        Schema::dropIfExists('independences');
    }
};
