<?php

namespace Database\Seeders;

use App\Models\Kajian;
use Illuminate\Database\Seeder;

class KajianSeeder extends Seeder
{
    public function run(): void
    {
        Kajian::whereNotNull('id')->delete();

        $data = [
            ['judul' => 'Tafsir Al-Quran Juz 30', 'hari' => 'Senin', 'waktu' => '16:00:00', 'pemateri' => 'Ustadz Dr. Abdul Aziz, M.A.', 'tempat' => 'Masjid Al-Barakah', 'kategori' => 'rutin', 'deskripsi' => 'Kajian tafsir Al-Quran juz 30 yang diadakan setiap hari Senin ba\'da Ashar. Membahas makna dan kandungan ayat-ayat Al-Quran.', 'aktif' => true],
            ['judul' => 'Fiqih Ibadah Praktis', 'hari' => 'Selasa', 'waktu' => '19:30:00', 'pemateri' => 'Ustadz Ahmad Zainuddin, Lc.', 'tempat' => 'Masjid Al-Barakah', 'kategori' => 'rutin', 'deskripsi' => 'Kajian fiqih ibadah sehari-hari yang membahas tata cara shalat, puasa, zakat, dan haji.', 'aktif' => true],
            ['judul' => 'Kajian Remaja Islam', 'hari' => 'Rabu', 'waktu' => '16:00:00', 'pemateri' => 'Ustadzah Nurul Hidayah', 'tempat' => 'Aula Masjid Al-Barakah', 'kategori' => 'remaja', 'deskripsi' => 'Kajian khusus untuk remaja dengan tema-tema kekinian yang relevan dengan kehidupan generasi muda Muslim.', 'aktif' => true],
            ['judul' => 'Khatib Jumat', 'hari' => 'Jumat', 'waktu' => '12:00:00', 'pemateri' => 'Ustadz H. Muhammad Yasin', 'tempat' => 'Masjid Al-Barakah', 'kategori' => 'khatib', 'deskripsi' => 'Khatib shalat Jumat rutin yang disampaikan secara bergantian oleh para ustadz.', 'aktif' => true],
            ['judul' => 'Kajian Pekanan Ahad Pagi', 'hari' => 'Minggu', 'waktu' => '06:00:00', 'pemateri' => 'Ustadz Dr. Abdul Aziz, M.A.', 'tempat' => 'Masjid Al-Barakah', 'kategori' => 'mingguan', 'deskripsi' => 'Kajian pekanan setiap hari Minggu pagi setelah shalat Subuh. Materi mencakup berbagai tema keislaman.', 'aktif' => true],
            ['judul' => 'Sirah Nabawiyah', 'hari' => 'Kamis', 'waktu' => '19:30:00', 'pemateri' => 'Ustadz Ahmad Zainuddin, Lc.', 'tempat' => 'Masjid Al-Barakah', 'kategori' => 'rutin', 'deskripsi' => 'Mempelajari sejarah hidup Nabi Muhammad SAW dari lahir hingga wafat sebagai teladan umat.', 'aktif' => true],
            ['judul' => 'Kajian Bulanan Muslimah', 'hari' => 'Sabtu', 'waktu' => '09:00:00', 'pemateri' => 'Ustadzah Nurul Hidayah', 'tempat' => 'Aula Masjid Al-Barakah', 'kategori' => 'bulanan', 'deskripsi' => 'Kajian bulanan khusus muslimah dengan tema keluarga, parenting, dan peran wanita dalam Islam.', 'aktif' => true],
            ['judul' => 'Tahsin dan Tahfidz', 'hari' => 'Sabtu', 'waktu' => '16:00:00', 'pemateri' => 'Ustadz H. Muhammad Yasin', 'tempat' => 'Masjid Al-Barakah', 'kategori' => 'rutin', 'deskripsi' => 'Program perbaikan bacaan Al-Quran (tahsin) dan hafalan (tahfidz) untuk jamaah.', 'aktif' => true],
        ];

        foreach ($data as $item) {
            Kajian::create($item);
        }
    }
}
