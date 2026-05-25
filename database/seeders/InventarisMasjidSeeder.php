<?php

namespace Database\Seeders;

use App\Models\InventarisMasjid;
use Illuminate\Database\Seeder;

class InventarisMasjidSeeder extends Seeder
{
    public function run(): void
    {
        InventarisMasjid::whereNotNull('id')->delete();

        $data = [
            ['nama' => 'Sound System', 'kategori' => 'elektronik', 'jumlah' => 2, 'kondisi' => 'baik', 'lokasi' => 'Ruang Utama Masjid', 'nilai' => 5000000, 'keterangan' => 'Sound system wireless untuk pengajian dan shalat Jumat', 'foto' => null],
            ['nama' => 'AC Split 2 PK', 'kategori' => 'elektronik', 'jumlah' => 4, 'kondisi' => 'baik', 'lokasi' => 'Ruang Utama Masjid', 'nilai' => 12000000, 'keterangan' => 'Pendingin ruangan utama masjid', 'foto' => null],
            ['nama' => 'Mimbar Khotbah', 'kategori' => 'furniture', 'jumlah' => 1, 'kondisi' => 'baik', 'lokasi' => 'Ruang Utama Masjid', 'nilai' => 3000000, 'keterangan' => 'Mimbar kayu jati untuk khotbah Jumat', 'foto' => null],
            ['nama' => 'Rak Buku Al-Quran', 'kategori' => 'furniture', 'jumlah' => 3, 'kondisi' => 'baik', 'lokasi' => 'Ruang Belajar', 'nilai' => 1500000, 'keterangan' => 'Rak buku untuk menyimpan Al-Quran dan kitab', 'foto' => null],
            ['nama' => 'Al-Quran (Mushaf)', 'kategori' => 'perlengkapan_ibadah', 'jumlah' => 50, 'kondisi' => 'baik', 'lokasi' => 'Rak Buku Masjid', 'nilai' => 2500000, 'keterangan' => 'Al-Quran standar Indonesia untuk jamaah', 'foto' => null],
            ['nama' => 'Sajadah Besar', 'kategori' => 'perlengkapan_ibadah', 'jumlah' => 30, 'kondisi' => 'baik', 'lokasi' => 'Gudang Masjid', 'nilai' => 1500000, 'keterangan' => 'Sajadah ukuran besar untuk shalat berjamaah', 'foto' => null],
            ['nama' => 'Lemari Buku', 'kategori' => 'furniture', 'jumlah' => 2, 'kondisi' => 'rusak_ringan', 'lokasi' => 'Perpustakaan Masjid', 'nilai' => 1000000, 'keterangan' => 'Lemari buku kaca, pintu sebelah kanan macet', 'foto' => null],
            ['nama' => 'Kipas Angin Gantung', 'kategori' => 'elektronik', 'jumlah' => 6, 'kondisi' => 'perlu_perbaikan', 'lokasi' => 'Ruang Utama Masjid', 'nilai' => 1800000, 'keterangan' => '2 unit tidak berfungsi, perlu perbaikan', 'foto' => null],
            ['nama' => 'Tempat Wudhu', 'kategori' => 'bangunan', 'jumlah' => 10, 'kondisi' => 'baik', 'lokasi' => 'Area Wudhu', 'nilai' => 8000000, 'keterangan' => 'Fasilitas wudhu dengan 10 kran air', 'foto' => null],
            ['nama' => 'Karpet Masjid', 'kategori' => 'perlengkapan_ibadah', 'jumlah' => 1, 'kondisi' => 'rusak', 'lokasi' => 'Ruang Utama Masjid', 'nilai' => 15000000, 'keterangan' => 'Karpet sudah usang dan robek di beberapa bagian, perlu diganti', 'foto' => null],
        ];

        foreach ($data as $item) {
            InventarisMasjid::create($item);
        }
    }
}
