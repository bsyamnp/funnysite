<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()// базаға жіберу
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('content');
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();//связки
            $table->foreignId('club_id')->constrained()->cascadeOnDelete();//
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() // up ti otmena jasaid
    {
        Schema::dropIfExists('comments');
    }
};
