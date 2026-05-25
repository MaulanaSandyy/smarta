<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inventaris_masjids', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('nama');
            $table->string('kategori');
            $table->integer('jumlah')->default(1);
            $table->enum('kondisi', ['baik', 'rusak_ringan', 'perlu_perbaikan', 'rusak'])->default('baik');
            $table->string('lokasi')->nullable();
            $table->decimal('nilai', 12, 2)->nullable();
            $table->text('keterangan')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inventaris_masjids');
    }
};
