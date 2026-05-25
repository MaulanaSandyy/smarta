<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pembayaran_iurans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('warga_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('iuran_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->decimal('jumlah', 12, 2);
            $table->date('tanggal_bayar');
            $table->string('bulan', 7)->comment('YYYY-MM');
            $table->enum('metode', ['tunai', 'transfer', 'e-wallet'])->default('tunai');
            $table->text('keterangan')->nullable();
            $table->string('bukti')->nullable();
            $table->boolean('dikonfirmasi')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembayaran_iurans');
    }
};
