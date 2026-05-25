<?php

namespace Database\Seeders;

use App\Models\LaporanKeamanan;
use Illuminate\Database\Seeder;

class LaporanKeamananSeeder extends Seeder
{
    public function run(): void
    {
        LaporanKeamanan::whereNotNull('id')->delete();

        $data = [
            ['warga_id' => 1, 'judul' => 'Situasi Aman', 'deskripsi' => 'Kondisi lingkungan RT 01 pada ronda malam hari ini dalam keadaan aman dan kondusif. Tidak ada kejadian menonjol.', 'status' => 'aman', 'tanggal' => '2026-05-04'],
            ['warga_id' => 3, 'judul' => 'Keramaian Warga', 'deskripsi' => 'Terjadi keramaian warga di sekitar pos 2. Setelah dicek ternyata hanya warga yang sedang berkumpul. Situasi aman.', 'status' => 'aman', 'tanggal' => '2026-05-05'],
            ['warga_id' => 5, 'judul' => 'Tamu Mencurigakan', 'deskripsi' => 'Terlihat orang tidak dikenal mondar-mandir di sekitar gang. Warga diminta waspada dan melaporkan jika melihat hal mencurigakan.', 'status' => 'tidak_aman', 'tanggal' => '2026-05-07'],
            ['warga_id' => 7, 'judul' => 'Laporan Kendaraan Hilang', 'deskripsi' => 'Warga melaporkan kehilangan sepeda motor di parkiran. Polisi sudah datang ke TKP. Mohon peningkatan kewaspadaan.', 'status' => 'tidak_aman', 'tanggal' => '2026-05-10'],
            ['warga_id' => 9, 'judul' => 'Pengecekan Rutin', 'deskripsi' => 'Pengecekan rutin keamanan lingkungan berjalan lancar. Semua pos dalam keadaan baik dan petugas ronda hadir semua.', 'status' => 'aman', 'tanggal' => '2026-05-12'],
            ['warga_id' => 12, 'judul' => 'Anjing Liar', 'deskripsi' => 'Beberapa anjing liar berkumpul di dekat pos 3. Mengganggu warga yang lewat. Mohon koordinasi dengan dinas terkait.', 'status' => 'tidak_aman', 'tanggal' => '2026-05-14'],
            ['warga_id' => 16, 'judul' => 'Kondisi Aman Terkendali', 'deskripsi' => 'Situasi keamanan lingkungan dalam kondisi aman terkendali. Arus lalu lintas lancar, tidak ada gangguan keamanan.', 'status' => 'aman', 'tanggal' => '2026-05-16'],
            ['warga_id' => 20, 'judul' => 'Cek Pos Keamanan', 'deskripsi' => 'Pengecekan semua pos keamanan. Pos 1 dan Pos 2 dalam kondisi baik, Pos 3 membutuhkan perbaikan lampu.', 'status' => 'aman', 'tanggal' => '2026-05-18'],
        ];

        foreach ($data as $item) {
            LaporanKeamanan::create($item);
        }
    }
}
