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
        Schema::create('losts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_pronunciation');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->uuid('uuid')->unique()->nullable();
            $table->string('tel1');
            $table->string('tel2')->nullable();
            $table->string('address')->nullable();
            $table->string('mon1')->default('0');
            $table->string('mon2')->default('0');
            $table->string('mon3')->default('0');
            $table->string('tue1')->default('0');
            $table->string('tue2')->default('0');
            $table->string('tue3')->default('0');
            $table->string('wed1')->default('0');
            $table->string('wed2')->default('0');
            $table->string('wed3')->default('0');
            $table->string('thu1')->default('0');
            $table->string('thu2')->default('0');
            $table->string('thu3')->default('0');
            $table->string('fri1')->default('0');
            $table->string('fri2')->default('0');
            $table->string('fri3')->default('0');
            $table->string('sat1')->default('0');
            $table->string('sat2')->default('0');
            $table->string('sat3')->default('0');
            $table->string('sun1')->default('0');
            $table->string('sun2')->default('0');
            $table->string('sun3')->default('0');
            $table->string('mode')->default('0');
            $table->rememberToken();
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
        Schema::dropIfExists('losts');
    }
};
