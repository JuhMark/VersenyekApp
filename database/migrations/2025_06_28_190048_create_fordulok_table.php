<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fordulok', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('roundNumber')->unsigned();
            $table->string('versenyName');
            $table->string('versenyYear');
            $table->foreign(['versenyName','versenyYear'])
            ->references(['name','year'])
            ->on('versenyek')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fordulok');
    }
};
