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
        Schema::table('users', function (Blueprint $table) {
            $table->string('support')->default('0');
            $table->string('weak')->nullable();
            $table->string('relax')->nullable();
            $table->string('can')->nullable();
            $table->string('cannot')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('support');
            $table->dropColumn('weak');
            $table->dropColumn('relax');
            $table->dropColumn('can');
            $table->dropColumn('cannot');

        });
    }
};
