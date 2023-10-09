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
        Schema::table('feels', function (Blueprint $table) {
            $table->string('img1')->default(0);
            $table->string('img2')->default(0);
            $table->string('img3')->default(0);
            $table->string('img4')->default(0);   
             });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('feels', function (Blueprint $table) {
            $table->dropColumn('img1');
            $table->dropColumn('img2');
            $table->dropColumn('img3');
            $table->dropColumn('img4');

        });
    }
};
