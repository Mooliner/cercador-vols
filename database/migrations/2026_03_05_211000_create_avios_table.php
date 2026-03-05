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
        Schema::create('avios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('companyia_id')->constrined('companyias')->cascadeOnDelete();
            $table->integer('capacitat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avios');
    }
};
