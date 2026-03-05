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
        Schema::create('vols', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aeroport_origen_id')->constrained('aeroports');
            $table->foreignId('aeroport_desti_id')->constrained('aeroports');
            $table->foreignId('companyia_id')->constrained('companyias');
            $table->foreignId('avio_id')->constrained('avios');
            $table->dateTime('data_sortida');
            $table->dateTime('data_arribada');
            $table->decimal('preu', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vols');
    }
};
