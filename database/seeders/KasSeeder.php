<?php

namespace Database\Seeders;

use App\Models\Kas;
use Illuminate\Database\Seeder;

class KasSeeder extends Seeder
{
    public function run(): void
    {
        Kas::whereNotNull('id')->delete();

        $data = [
            ['warga_id' => 1, 'tipe' => 'pemasukan', 'jumlah' => 500000, 'kategori' => 'iuran', 'keterangan' => 'Iuran Kas RT bulan April 2026', 'tanggal' => '2026-04-01', 'bukti' => null],
            ['warga_id' => 3, 'tipe' => 'pemasukan', 'jumlah' => 200000, 'kategori' => 'donasi', 'keterangan' => 'Donasi dari Pak Budi untuk kegiatan RT', 'tanggal' => '2026-04-05', 'bukti' => null],
            ['warga_id' => null, 'tipe' => 'pemasukan', 'jumlah' => 1500000, 'kategori' => 'sumbangan', 'keterangan' => 'Sumbangan dari perusahaan PT Maju Bersama', 'tanggal' => '2026-04-10', 'bukti' => null],
            ['warga_id' => null, 'tipe' => 'pengeluaran', 'jumlah' => 300000, 'kategori' => 'operasional', 'keterangan' => 'Pembelian ATK untuk administrasi RT', 'tanggal' => '2026-04-12', 'bukti' => null],
            ['warga_id' => null, 'tipe' => 'pengeluaran', 'jumlah' => 750000, 'kategori' => 'perbaikan', 'keterangan' => 'Perbaikan lampu jalan 5 unit', 'tanggal' => '2026-04-15', 'bukti' => null],
            ['warga_id' => null, 'tipe' => 'pengeluaran', 'jumlah' => 200000, 'kategori' => 'konsumsi', 'keterangan' => 'Konsumsi rapat RT bulan April', 'tanggal' => '2026-04-07', 'bukti' => null],
            ['warga_id' => 1, 'tipe' => 'pemasukan', 'jumlah' => 500000, 'kategori' => 'iuran', 'keterangan' => 'Iuran Kas RT bulan Mei 2026', 'tanggal' => '2026-05-01', 'bukti' => null],
            ['warga_id' => 2, 'tipe' => 'pemasukan', 'jumlah' => 500000, 'kategori' => 'iuran', 'keterangan' => 'Iuran Kas RT bulan Mei 2026', 'tanggal' => '2026-05-02', 'bukti' => null],
            ['warga_id' => 3, 'tipe' => 'pemasukan', 'jumlah' => 500000, 'kategori' => 'iuran', 'keterangan' => 'Iuran Kas RT bulan Mei 2026', 'tanggal' => '2026-05-03', 'bukti' => null],
            ['warga_id' => 4, 'tipe' => 'pemasukan', 'jumlah' => 500000, 'kategori' => 'iuran', 'keterangan' => 'Iuran Kas RT bulan Mei 2026', 'tanggal' => '2026-05-04', 'bukti' => null],
            ['warga_id' => 5, 'tipe' => 'pemasukan', 'jumlah' => 500000, 'kategori' => 'iuran', 'keterangan' => 'Iuran Kas RT bulan Mei 2026', 'tanggal' => '2026-05-05', 'bukti' => null],
            ['warga_id' => null, 'tipe' => 'pengeluaran', 'jumlah' => 350000, 'kategori' => 'operasional', 'keterangan' => 'Pembayaran listrik fasilitas umum', 'tanggal' => '2026-05-06', 'bukti' => null],
            ['warga_id' => null, 'tipe' => 'pengeluaran', 'jumlah' => 500000, 'kategori' => 'perbaikan', 'keterangan' => 'Perbaikan pagar balai warga', 'tanggal' => '2026-05-10', 'bukti' => null],
            ['warga_id' => null, 'tipe' => 'pengeluaran', 'jumlah' => 150000, 'kategori' => 'konsumsi', 'keterangan' => 'Konsumsi kerja bakti', 'tanggal' => '2026-05-12', 'bukti' => null],
            ['warga_id' => 7, 'tipe' => 'pemasukan', 'jumlah' => 100000, 'kategori' => 'donasi', 'keterangan' => 'Donasi sukarela warga untuk kegiatan 17 Agustus', 'tanggal' => '2026-05-14', 'bukti' => null],
            ['warga_id' => null, 'tipe' => 'pengeluaran', 'jumlah' => 800000, 'kategori' => 'operasional', 'keterangan' => 'Pembelian seragam posyandu', 'tanggal' => '2026-05-16', 'bukti' => null],
            ['warga_id' => 1, 'tipe' => 'pemasukan', 'jumlah' => 500000, 'kategori' => 'iuran', 'keterangan' => 'Iuran Kas RT bulan Maret 2026', 'tanggal' => '2026-03-01', 'bukti' => null],
            ['warga_id' => null, 'tipe' => 'pengeluaran', 'jumlah' => 250000, 'kategori' => 'konsumsi', 'keterangan' => 'Snack untuk acara sosialisasi', 'tanggal' => '2026-03-10', 'bukti' => null],
            ['warga_id' => null, 'tipe' => 'pengeluaran', 'jumlah' => 1000000, 'kategori' => 'perbaikan', 'keterangan' => 'Pengecoran jalan lingkungan', 'tanggal' => '2026-03-20', 'bukti' => null],
            ['warga_id' => 9, 'tipe' => 'pemasukan', 'jumlah' => 300000, 'kategori' => 'sumbangan', 'keterangan' => 'Sumbangan warga untuk korban bencana', 'tanggal' => '2026-03-25', 'bukti' => null],
        ];

        foreach ($data as $item) {
            Kas::create($item);
        }
    }
}
