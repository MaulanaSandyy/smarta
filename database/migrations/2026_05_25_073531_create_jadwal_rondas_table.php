<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jadwal_rondas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ronda_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('warga_id')->nullable()->constrained()->nullOnDelete();
            $table->string('hari');
            $table->time('waktu')->nullable();
            $table->string('pos');
            $table->date('tanggal')->nullable();
            $table->boolean('hadir')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jadwal_rondas');
    }
};
