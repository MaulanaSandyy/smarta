<?php

namespace Database\Seeders;

use App\Models\Galeri;
use Illuminate\Database\Seeder;

class GaleriSeeder extends Seeder
{
    public function run(): void
    {
        Galeri::whereNotNull('id')->delete();

        $data = [
            ['judul' => 'Kegiatan Kerja Bakti Mei 2026', 'deskripsi' => 'Dokumentasi kegiatan kerja bakti warga RT 01 membersihkan lingkungan', 'tipe' => 'foto', 'file' => 'galeri/kerja_bakti_mei_2026.jpg', 'url' => null, 'tanggal' => '2026-05-02', 'status' => 'terbit'],
            ['judul' => 'Rapat RT Bulan April', 'deskripsi' => 'Dokumentasi rapat rutin bulanan RT 01 bulan April', 'tipe' => 'foto', 'file' => 'galeri/rapat_rt_april_2026.jpg', 'url' => null, 'tanggal' => '2026-04-07', 'status' => 'terbit'],
            ['judul' => 'Pengajian Akbar Maulid Nabi', 'deskripsi' => 'Rekaman video pengajian akbar dalam rangka Maulid Nabi Muhammad SAW', 'tipe' => 'video', 'file' => 'galeri/pengajian_maulid.mp4', 'url' => 'https://www.youtube.com/watch?v=example1', 'tanggal' => '2026-04-15', 'status' => 'terbit'],
            ['judul' => 'Lomba 17 Agustusan 2025', 'deskripsi' => 'Foto-foto lomba 17 Agustusan tahun lalu yang meriah', 'tipe' => 'foto', 'file' => 'galeri/lomba_17_agustus_2025.jpg', 'url' => null, 'tanggal' => '2025-08-17', 'status' => 'terbit'],
            ['judul' => 'Tutorial Pembuatan Pupuk Organik', 'deskripsi' => 'Artikel edukasi tentang cara membuat pupuk organik dari limbah rumah tangga', 'tipe' => 'artikel', 'file' => 'galeri/pupuk_organik.html', 'url' => null, 'tanggal' => '2026-04-20', 'status' => 'terbit'],
            ['judul' => 'Kegiatan Posyandu', 'deskripsi' => 'Dokumentasi kegiatan posyandu balita bulan April', 'tipe' => 'foto', 'file' => 'galeri/posyandu_april_2026.jpg', 'url' => null, 'tanggal' => '2026-04-10', 'status' => 'terbit'],
            ['judul' => 'Pelatihan Digital Marketing UMKM', 'deskripsi' => 'Video rekaman pelatihan digital marketing untuk para pelaku UMKM', 'tipe' => 'video', 'file' => 'galeri/pelatihan_digital_marketing.mp4', 'url' => 'https://www.youtube.com/watch?v=example2', 'tanggal' => '2026-03-20', 'status' => 'terbit'],
            ['judul' => 'Bakti Sosial Sembako', 'deskripsi' => 'Dokumentasi pembagian sembako untuk warga kurang mampu', 'tipe' => 'foto', 'file' => 'galeri/baksos_sembako_2026.jpg', 'url' => null, 'tanggal' => '2026-03-25', 'status' => 'terbit'],
            ['judul' => 'Profil Singkat RT 01', 'deskripsi' => 'Artikel profil dan sejarah singkat RT 01/RW 01 Kelurahan Contoh', 'tipe' => 'artikel', 'file' => 'galeri/profil_rt_01.html', 'url' => null, 'tanggal' => '2026-01-01', 'status' => 'terbit'],
            ['judul' => 'Kegiatan Ronda Malam', 'deskripsi' => 'Foto kegiatan ronda malam warga', 'tipe' => 'foto', 'file' => 'galeri/ronda_malam.jpg', 'url' => null, 'tanggal' => '2026-05-04', 'status' => 'draft'],
            ['judul' => 'Peringatan Hari Ibu', 'deskripsi' => 'Dokumentasi acara peringatan Hari Ibu di lingkungan RT', 'tipe' => 'foto', 'file' => 'galeri/hari_ibu_2026.jpg', 'url' => null, 'tanggal' => '2025-12-22', 'status' => 'terbit'],
            ['judul' => 'Tips Kesehatan Keluarga', 'deskripsi' => 'Artikel tips menjaga kesehatan keluarga di musim pancaroba', 'tipe' => 'artikel', 'file' => 'galeri/tips_kesehatan.html', 'url' => null, 'tanggal' => '2026-04-25', 'status' => 'draft'],
        ];

        foreach ($data as $item) {
            Galeri::create($item);
        }
    }
}
