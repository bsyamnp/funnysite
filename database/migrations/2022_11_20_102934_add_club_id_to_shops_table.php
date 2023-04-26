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
        Schema::table('shops', function (Blueprint $table) {
            $table->foreignId('club_id')->constrained()->restrictOnDelete();
        });
    }
    public function down()
    {
        Schema::table('shops', function (Blueprint $table) {
            $table->dropForeign('shops_club_id_foreign');
            $table->dropColumn('club_id');
        });
    }
};
