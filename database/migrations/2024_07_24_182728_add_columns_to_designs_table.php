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
        Schema::table('designs', function (Blueprint $table) {
            $table->string('width')->nullable();
            $table->string('height')->nullable(); 
            $table->string('depth')->nullable();
            $table->string('weight')->nullable();
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('designs', function (Blueprint $table) {
            $table->dropColumn('width');
            $table->dropColumn('height');
            $table->dropColumn('depth');
            $table->dropColumn('weight');
        });
    }
};
