<?php

namespace Database\Seeders;

use App\Models\KeuanganMasjid;
use Illuminate\Database\Seeder;

class KeuanganMasjidSeeder extends Seeder
{
    public function run(): void
    {
        KeuanganMasjid::whereNotNull('id')->delete();

        $data = [
            ['tipe' => 'pemasukan', 'jumlah' => 2000000, 'kategori' => 'infaq', 'keterangan' => 'Infaq Jumat 3 April 2026', 'tanggal' => '2026-04-03', 'bukti' => null],
            ['tipe' => 'pemasukan', 'jumlah' => 500000, 'kategori' => 'donasi', 'keterangan' => 'Donasi pembangunan dari Bapak H. Ahmad', 'tanggal' => '2026-04-05', 'bukti' => null],
            ['tipe' => 'pengeluaran', 'jumlah' => 300000, 'kategori' => 'operasional', 'keterangan' => 'Pembayaran listrik masjid bulan April', 'tanggal' => '2026-04-07', 'bukti' => null],
            ['tipe' => 'pengeluaran', 'jumlah' => 150000, 'kategori' => 'konsumsi', 'keterangan' => 'Konsumsi pengajian rutin', 'tanggal' => '2026-04-10', 'bukti' => null],
            ['tipe' => 'pemasukan', 'jumlah' => 1500000, 'kategori' => 'zakat', 'keterangan' => 'Zakat fitrah Ramadhan 1447 H', 'tanggal' => '2026-04-12', 'bukti' => null],
            ['tipe' => 'pemasukan', 'jumlah' => 1000000, 'kategori' => 'infaq', 'keterangan' => 'Infaq Jumat 10 April 2026', 'tanggal' => '2026-04-10', 'bukti' => null],
            ['tipe' => 'pengeluaran', 'jumlah' => 2500000, 'kategori' => 'perbaikan', 'keterangan' => 'Perbaikan atap masjid bocor', 'tanggal' => '2026-04-15', 'bukti' => null],
            ['tipe' => 'pemasukan', 'jumlah' => 3000000, 'kategori' => 'donasi', 'keterangan' => 'Donasi pembangunan dari PT Berkah Abadi', 'tanggal' => '2026-04-20', 'bukti' => null],
            ['tipe' => 'pengeluaran', 'jumlah' => 500000, 'kategori' => 'operasional', 'keterangan' => 'Pembelian air mineral dan perlengkapan masjid', 'tanggal' => '2026-04-22', 'bukti' => null],
            ['tipe' => 'pemasukan', 'jumlah' => 1800000, 'kategori' => 'infaq', 'keterangan' => 'Infaq Jumat 17 April 2026', 'tanggal' => '2026-04-17', 'bukti' => null],
            ['tipe' => 'pengeluaran', 'jumlah' => 750000, 'kategori' => 'perlengkapan', 'keterangan' => 'Pembelian sajadah baru 25 pcs', 'tanggal' => '2026-04-25', 'bukti' => null],
            ['tipe' => 'pemasukan', 'jumlah' => 2200000, 'kategori' => 'infaq', 'keterangan' => 'Infaq Jumat 24 April 2026', 'tanggal' => '2026-04-24', 'bukti' => null],
            ['tipe' => 'pengeluaran', 'jumlah' => 200000, 'kategori' => 'konsumsi', 'keterangan' => 'Konsumsi buka puasa bersama', 'tanggal' => '2026-04-28', 'bukti' => null],
            ['tipe' => 'pemasukan', 'jumlah' => 3000000, 'kategori' => 'zakat', 'keterangan' => 'Zakat mal dari donatur', 'tanggal' => '2026-05-01', 'bukti' => null],
            ['tipe' => 'pemasukan', 'jumlah' => 2500000, 'kategori' => 'infaq', 'keterangan' => 'Infaq Idul Fitri 1447 H', 'tanggal' => '2026-05-03', 'bukti' => null],
            ['tipe' => 'pengeluaran', 'jumlah' => 1000000, 'kategori' => 'operasional', 'keterangan' => 'Honor marbot dan pengurus masjid', 'tanggal' => '2026-05-05', 'bukti' => null],
            ['tipe' => 'pemasukan', 'jumlah' => 1000000, 'kategori' => 'donasi', 'keterangan' => 'Donasi dari jamaah untuk renovasi toilet', 'tanggal' => '2026-05-08', 'bukti' => null],
            ['tipe' => 'pengeluaran', 'jumlah' => 600000, 'kategori' => 'perlengkapan', 'keterangan' => 'Pembelian Al-Quran baru 20 pcs', 'tanggal' => '2026-05-10', 'bukti' => null],
            ['tipe' => 'pengeluaran', 'jumlah' => 400000, 'kategori' => 'perbaikan', 'keterangan' => 'Perbaikan kipas angin masjid', 'tanggal' => '2026-05-12', 'bukti' => null],
            ['tipe' => 'pemasukan', 'jumlah' => 1200000, 'kategori' => 'infaq', 'keterangan' => 'Infaq Jumat 8 Mei 2026', 'tanggal' => '2026-05-08', 'bukti' => null],
        ];

        foreach ($data as $item) {
            KeuanganMasjid::create($item);
        }
    }
}
