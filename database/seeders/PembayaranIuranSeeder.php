<?php

namespace Database\Seeders;

use App\Models\PembayaranIuran;
use Illuminate\Database\Seeder;

class PembayaranIuranSeeder extends Seeder
{
    public function run(): void
    {
        PembayaranIuran::whereNotNull('id')->delete();

        $data = [
            ['warga_id' => 1, 'iuran_id' => 1, 'jumlah' => 50000, 'tanggal_bayar' => '2026-05-02', 'bulan' => '2026-05', 'metode' => 'tunai', 'keterangan' => 'Pembayaran kas RT bulan Mei', 'bukti' => null, 'dikonfirmasi' => true],
            ['warga_id' => 1, 'iuran_id' => 2, 'jumlah' => 30000, 'tanggal_bayar' => '2026-05-02', 'bulan' => '2026-05', 'metode' => 'tunai', 'keterangan' => null, 'bukti' => null, 'dikonfirmasi' => true],
            ['warga_id' => 2, 'iuran_id' => 1, 'jumlah' => 50000, 'tanggal_bayar' => '2026-05-03', 'bulan' => '2026-05', 'metode' => 'transfer', 'keterangan' => null, 'bukti' => null, 'dikonfirmasi' => true],
            ['warga_id' => 2, 'iuran_id' => 3, 'jumlah' => 25000, 'tanggal_bayar' => '2026-05-03', 'bulan' => '2026-05', 'metode' => 'transfer', 'keterangan' => null, 'bukti' => null, 'dikonfirmasi' => true],
            ['warga_id' => 3, 'iuran_id' => 1, 'jumlah' => 50000, 'tanggal_bayar' => '2026-05-04', 'bulan' => '2026-05', 'metode' => 'tunai', 'keterangan' => 'Lunas', 'bukti' => null, 'dikonfirmasi' => true],
            ['warga_id' => 3, 'iuran_id' => 4, 'jumlah' => 20000, 'tanggal_bayar' => '2026-05-04', 'bulan' => '2026-05', 'metode' => 'tunai', 'keterangan' => null, 'bukti' => null, 'dikonfirmasi' => true],
            ['warga_id' => 4, 'iuran_id' => 1, 'jumlah' => 50000, 'tanggal_bayar' => '2026-05-05', 'bulan' => '2026-05', 'metode' => 'e-wallet', 'keterangan' => null, 'bukti' => null, 'dikonfirmasi' => true],
            ['warga_id' => 4, 'iuran_id' => 5, 'jumlah' => 15000, 'tanggal_bayar' => '2026-05-05', 'bulan' => '2026-05', 'metode' => 'e-wallet', 'keterangan' => null, 'bukti' => null, 'dikonfirmasi' => true],
            ['warga_id' => 5, 'iuran_id' => 1, 'jumlah' => 50000, 'tanggal_bayar' => '2026-05-06', 'bulan' => '2026-05', 'metode' => 'transfer', 'keterangan' => null, 'bukti' => null, 'dikonfirmasi' => true],
            ['warga_id' => 5, 'iuran_id' => 2, 'jumlah' => 30000, 'tanggal_bayar' => '2026-05-06', 'bulan' => '2026-05', 'metode' => 'transfer', 'keterangan' => null, 'bukti' => null, 'dikonfirmasi' => true],
            ['warga_id' => 6, 'iuran_id' => 1, 'jumlah' => 50000, 'tanggal_bayar' => '2026-05-07', 'bulan' => '2026-04', 'metode' => 'tunai', 'keterangan' => 'Bayar iuran April', 'bukti' => null, 'dikonfirmasi' => true],
            ['warga_id' => 7, 'iuran_id' => 1, 'jumlah' => 50000, 'tanggal_bayar' => '2026-05-08', 'bulan' => '2026-05', 'metode' => 'tunai', 'keterangan' => null, 'bukti' => null, 'dikonfirmasi' => true],
            ['warga_id' => 7, 'iuran_id' => 3, 'jumlah' => 25000, 'tanggal_bayar' => '2026-05-08', 'bulan' => '2026-05', 'metode' => 'tunai', 'keterangan' => null, 'bukti' => null, 'dikonfirmasi' => true],
            ['warga_id' => 8, 'iuran_id' => 1, 'jumlah' => 50000, 'tanggal_bayar' => '2026-05-09', 'bulan' => '2026-05', 'metode' => 'transfer', 'keterangan' => null, 'bukti' => null, 'dikonfirmasi' => false],
            ['warga_id' => 9, 'iuran_id' => 2, 'jumlah' => 30000, 'tanggal_bayar' => '2026-05-10', 'bulan' => '2026-05', 'metode' => 'e-wallet', 'keterangan' => null, 'bukti' => null, 'dikonfirmasi' => true],
            ['warga_id' => 10, 'iuran_id' => 1, 'jumlah' => 50000, 'tanggal_bayar' => '2026-05-11', 'bulan' => '2026-05', 'metode' => 'tunai', 'keterangan' => null, 'bukti' => null, 'dikonfirmasi' => true],
            ['warga_id' => 10, 'iuran_id' => 4, 'jumlah' => 20000, 'tanggal_bayar' => '2026-05-11', 'bulan' => '2026-05', 'metode' => 'tunai', 'keterangan' => null, 'bukti' => null, 'dikonfirmasi' => true],
            ['warga_id' => 12, 'iuran_id' => 1, 'jumlah' => 50000, 'tanggal_bayar' => '2026-05-12', 'bulan' => '2026-05', 'metode' => 'transfer', 'keterangan' => null, 'bukti' => null, 'dikonfirmasi' => true],
            ['warga_id' => 12, 'iuran_id' => 5, 'jumlah' => 15000, 'tanggal_bayar' => '2026-05-12', 'bulan' => '2026-05', 'metode' => 'transfer', 'keterangan' => null, 'bukti' => null, 'dikonfirmasi' => true],
            ['warga_id' => 14, 'iuran_id' => 1, 'jumlah' => 50000, 'tanggal_bayar' => '2026-05-13', 'bulan' => '2026-04', 'metode' => 'tunai', 'keterangan' => 'Bayar iuran April', 'bukti' => null, 'dikonfirmasi' => true],
            ['warga_id' => 14, 'iuran_id' => 3, 'jumlah' => 25000, 'tanggal_bayar' => '2026-05-13', 'bulan' => '2026-04', 'metode' => 'tunai', 'keterangan' => null, 'bukti' => null, 'dikonfirmasi' => true],
            ['warga_id' => 16, 'iuran_id' => 1, 'jumlah' => 50000, 'tanggal_bayar' => '2026-05-14', 'bulan' => '2026-05', 'metode' => 'e-wallet', 'keterangan' => null, 'bukti' => null, 'dikonfirmasi' => true],
            ['warga_id' => 16, 'iuran_id' => 2, 'jumlah' => 30000, 'tanggal_bayar' => '2026-05-14', 'bulan' => '2026-05', 'metode' => 'e-wallet', 'keterangan' => null, 'bukti' => null, 'dikonfirmasi' => true],
            ['warga_id' => 18, 'iuran_id' => 1, 'jumlah' => 50000, 'tanggal_bayar' => '2026-05-14', 'bulan' => '2026-05', 'metode' => 'tunai', 'keterangan' => 'Belum dibayar', 'bukti' => null, 'dikonfirmasi' => false],
            ['warga_id' => 20, 'iuran_id' => 1, 'jumlah' => 50000, 'tanggal_bayar' => '2026-05-15', 'bulan' => '2026-05', 'metode' => 'transfer', 'keterangan' => null, 'bukti' => null, 'dikonfirmasi' => true],
            ['warga_id' => 20, 'iuran_id' => 4, 'jumlah' => 20000, 'tanggal_bayar' => '2026-05-15', 'bulan' => '2026-05', 'metode' => 'transfer', 'keterangan' => null, 'bukti' => null, 'dikonfirmasi' => true],
            ['warga_id' => 22, 'iuran_id' => 1, 'jumlah' => 50000, 'tanggal_bayar' => '2026-05-16', 'bulan' => '2026-05', 'metode' => 'tunai', 'keterangan' => null, 'bukti' => null, 'dikonfirmasi' => false],
            ['warga_id' => 22, 'iuran_id' => 2, 'jumlah' => 30000, 'tanggal_bayar' => '2026-05-16', 'bulan' => '2026-05', 'metode' => 'tunai', 'keterangan' => null, 'bukti' => null, 'dikonfirmasi' => false],
            ['warga_id' => 24, 'iuran_id' => 1, 'jumlah' => 50000, 'tanggal_bayar' => '2026-05-16', 'bulan' => '2026-05', 'metode' => 'tunai', 'keterangan' => null, 'bukti' => null, 'dikonfirmasi' => true],
            ['warga_id' => 24, 'iuran_id' => 3, 'jumlah' => 25000, 'tanggal_bayar' => '2026-05-16', 'bulan' => '2026-05', 'metode' => 'tunai', 'keterangan' => null, 'bukti' => null, 'dikonfirmasi' => true],
        ];

        foreach ($data as $item) {
            PembayaranIuran::create($item);
        }
    }
}
