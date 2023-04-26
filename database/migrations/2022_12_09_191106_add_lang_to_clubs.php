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
        Schema::table('clubs', function (Blueprint $table) {
            $table->string('name_kz')->nullable();
            $table->string('name_en')->nullable();
            $table->string('country_kz')->nullable();
            $table->string('country_en')->nullable();
            $table->string('stadium_kz')->nullable();
            $table->string('stadium_en')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clubs', function (Blueprint $table) {
            $table->dropColumn('name_kz');
            $table->dropColumn('name_en');
            $table->dropColumn('country_kz');
            $table->dropColumn('country_en');
            $table->dropColumn('stadium_kz');
            $table->dropColumn('stadium_en');
        });
    }
};
