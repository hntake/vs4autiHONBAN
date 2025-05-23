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
        Schema::table('losts', function (Blueprint $table) {
            $table->tinyInteger('email_verified')->default(0);
            $table->string('email_verify_token')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('losts', function (Blueprint $table) {
            $table->dropColumn('email_verified');
            $table->dropColumn('email_verify_token');
        });
    }
};
