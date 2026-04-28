<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('table_restaurants', function (Blueprint $table) {
            $table->id();
            $table->integer('numero')->unique();
            $table->integer('capacite');
            $table->enum('statut', ['libre', 'occupee'])->default('libre');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('table_restaurants');
    }
};