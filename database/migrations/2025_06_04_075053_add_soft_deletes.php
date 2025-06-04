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
        Schema::table('salas', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('reports', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('imagenes', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('mensajes', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('salas', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('reports', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('imagenes', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('mensajes', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};