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
        Schema::create('versenyzok', function (Blueprint $table) {
            $table->string('felhasznaloEmail');
            $table->integer('forduloId');
            $table->primary(['felhasznaloEmail','forduloId']);
            $table->foreign('felhasznaloEmail')
            ->references('email')
            ->on('felhasznalok')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('forduloId')
            ->references('id')
            ->on('fordulok')
            ->onDelete( 'cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('versenyzok');
    }
};