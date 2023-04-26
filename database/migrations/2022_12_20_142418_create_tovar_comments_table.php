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
        Schema::create('tovar_comments', function (Blueprint $table) {
            $table->id();
            $table->string('content');
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();//связки
            $table->foreignId('shop_id')->constrained()->cascadeOnDelete();//
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
        Schema::dropIfExists('tovar_comments');
    }
};
