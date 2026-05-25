<?php

namespace Database\Seeders;

use App\Models\KalenderEvent;
use Illuminate\Database\Seeder;

class KalenderEventSeeder extends Seeder
{
    public function run(): void
    {
        KalenderEvent::whereNotNull('id')->delete();

        $data = [
            ['judul' => 'Rapat RT Bulan Juni', 'tanggal' => '2026-06-07', 'waktu' => '19:00:00', 'lokasi' => 'Balai Warga RT 01', 'kategori' => 'kegiatan', 'deskripsi' => 'Rapat rutin bulanan warga RT 01', 'warna' => '#3498db'],
            ['judul' => 'Hari Lahir Pancasila', 'tanggal' => '2026-06-01', 'waktu' => null, 'lokasi' => '-', 'kategori' => 'libur', 'deskripsi' => 'Libur nasional Hari Lahir Pancasila', 'warna' => '#e74c3c'],
            ['judul' => 'Isra Miraj', 'tanggal' => '2026-04-15', 'waktu' => null, 'lokasi' => 'Masjid Al-Barakah', 'kategori' => 'ibadah', 'deskripsi' => 'Peringatan Isra Miraj Nabi Muhammad SAW', 'warna' => '#9b59b6'],
            ['judul' => 'Pengajian Akbar', 'tanggal' => '2026-06-14', 'waktu' => '09:00:00', 'lokasi' => 'Masjid Al-Barakah', 'kategori' => 'ibadah', 'deskripsi' => 'Pengajian akbar dengan tema "Memperkuat Ukhuwah Islamiyah"', 'warna' => '#2ecc71'],
            ['judul' => 'Pelatihan UMKM', 'tanggal' => '2026-06-20', 'waktu' => '09:00:00', 'lokasi' => 'Aula Kelurahan', 'kategori' => 'kegiatan', 'deskripsi' => 'Pelatihan digital marketing untuk UMKM warga', 'warna' => '#f39c12'],
            ['judul' => 'Hari Raya Idul Adha', 'tanggal' => '2026-06-28', 'waktu' => '06:30:00', 'lokasi' => 'Lapangan Kelurahan', 'kategori' => 'libur', 'deskripsi' => 'Shalat Idul Adha dan penyembelihan hewan qurban', 'warna' => '#e74c3c'],
            ['judul' => 'Bakti Sosial', 'tanggal' => '2026-07-05', 'waktu' => '08:00:00', 'lokasi' => 'Balai Warga', 'kategori' => 'sosial', 'deskripsi' => 'Bakti sosial pembagian sembako untuk warga kurang mampu', 'warna' => '#1abc9c'],
            ['judul' => 'Lomba 17 Agustus', 'tanggal' => '2026-08-17', 'waktu' => '08:00:00', 'lokasi' => 'Lapangan Olahraga', 'kategori' => 'kegiatan', 'deskripsi' => 'Lomba peringatan HUT RI ke-81', 'warna' => '#e74c3c'],
            ['judul' => 'Tahun Baru Islam', 'tanggal' => '2026-07-06', 'waktu' => null, 'lokasi' => '-', 'kategori' => 'libur', 'deskripsi' => 'Tahun Baru 1448 Hijriyah', 'warna' => '#9b59b6'],
            ['judul' => 'Jadwal Vaksinasi', 'tanggal' => '2026-06-10', 'waktu' => '08:00:00', 'lokasi' => 'Puskesmas Kelurahan', 'kategori' => 'sosial', 'deskripsi' => 'Vaksinasi COVID-19 dosis booster untuk warga', 'warna' => '#3498db'],
            ['judul' => 'Gotong Royong', 'tanggal' => '2026-06-21', 'waktu' => '07:00:00', 'lokasi' => 'Lingkungan RT 01', 'kategori' => 'kegiatan', 'deskripsi' => 'Gotong royong membersihkan lingkungan', 'warna' => '#2ecc71'],
            ['judul' => 'Peringatan Hari Anak Nasional', 'tanggal' => '2026-07-23', 'waktu' => '08:00:00', 'lokasi' => 'Posyandu Mawar', 'kategori' => 'kegiatan', 'deskripsi' => 'Peringatan Hari Anak Nasional dengan lomba mewarnai', 'warna' => '#f1c40f'],
            ['judul' => 'Senam Sehat', 'tanggal' => '2026-05-31', 'waktu' => '06:30:00', 'lokasi' => 'Lapangan Olahraga', 'kategori' => 'kegiatan', 'deskripsi' => 'Senam sehat bersama setiap hari Minggu', 'warna' => '#1abc9c'],
            ['judul' => 'Sosialisasi Pemilu', 'tanggal' => '2026-09-15', 'waktu' => '10:00:00', 'lokasi' => 'Balai Warga', 'kategori' => 'sosial', 'deskripsi' => 'Sosialisasi pemilu serentak 2026', 'warna' => '#e67e22'],
            ['judul' => 'Maulid Nabi', 'tanggal' => '2026-09-28', 'waktu' => '19:00:00', 'lokasi' => 'Masjid Al-Barakah', 'kategori' => 'ibadah', 'deskripsi' => 'Peringatan Maulid Nabi Muhammad SAW 1448 H', 'warna' => '#9b59b6'],
        ];

        foreach ($data as $item) {
            KalenderEvent::create($item);
        }
    }
}
