<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('donasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('donatur');
            $table->date('tanggal');
            $table->enum('jenis', ['donasi', 'zakat', 'infaq', 'sedekah', 'qurban']);
            $table->decimal('jumlah', 12, 2);
            $table->enum('status', ['tercatat', 'dikonfirmasi', 'disalurkan'])->default('tercatat');
            $table->text('keterangan')->nullable();
            $table->string('bukti')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('donasis');
    }
};
