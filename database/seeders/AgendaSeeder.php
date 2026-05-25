<?php

namespace Database\Seeders;

use App\Models\Agenda;
use Illuminate\Database\Seeder;

class AgendaSeeder extends Seeder
{
    public function run(): void
    {
        Agenda::whereNotNull('id')->delete();

        $data = [
            ['judul' => 'Rapat RT Bulanan', 'tanggal' => '2026-06-07', 'waktu' => '19:00:00', 'tempat' => 'Balai Warga RT 01', 'kategori' => 'rapat', 'deskripsi' => 'Rapat rutin bulanan warga RT 01 membahas iuran, keamanan, dan kegiatan sosial.', 'status' => 'akan_datang'],
            ['judul' => 'Kerja Bakti Lingkungan', 'tanggal' => '2026-06-13', 'waktu' => '07:00:00', 'tempat' => 'Lingkungan RT 01', 'kategori' => 'kegiatan', 'deskripsi' => 'Kerja bakti membersihkan selokan, memotong rumput, dan membersihkan fasilitas umum.', 'status' => 'akan_datang'],
            ['judul' => 'Pengajian Rutin Mingguan', 'tanggal' => '2026-05-30', 'waktu' => '16:00:00', 'tempat' => 'Masjid Al-Barakah', 'kategori' => 'ibadah', 'deskripsi' => 'Pengajian rutin mingguan ba\'da Ashar dengan tema "Keluarga Sakinah".', 'status' => 'akan_datang'],
            ['judul' => 'Posyandu Balita', 'tanggal' => '2026-05-28', 'waktu' => '08:00:00', 'tempat' => 'Posyandu Mawar', 'kategori' => 'kegiatan', 'deskripsi' => 'Pelayanan posyandu balita meliputi penimbangan, imunisasi, dan penyuluhan gizi.', 'status' => 'akan_datang'],
            ['judul' => 'Pelatihan Kewirausahaan', 'tanggal' => '2026-05-15', 'waktu' => '09:00:00', 'tempat' => 'Aula Kelurahan', 'kategori' => 'kegiatan', 'deskripsi' => 'Pelatihan membuat kerajinan tangan dari barang bekas untuk ibu-ibu PKK.', 'status' => 'selesai'],
            ['judul' => 'Rapat Koordinasi Keamanan', 'tanggal' => '2026-05-10', 'waktu' => '20:00:00', 'tempat' => 'Pos Satpam', 'kategori' => 'rapat', 'deskripsi' => 'Rapat koordinasi jadwal ronda dan sistem keamanan lingkungan.', 'status' => 'selesai'],
            ['judul' => 'Lomba 17 Agustusan', 'tanggal' => '2026-08-17', 'waktu' => '08:00:00', 'tempat' => 'Lapangan Olahraga RT 01', 'kategori' => 'kegiatan', 'deskripsi' => 'Perlombaan meriah dalam rangka HUT RI ke-81. Berbagai lomba untuk anak-anak dan dewasa.', 'status' => 'akan_datang'],
            ['judul' => 'Pengobatan Gratis', 'tanggal' => '2026-06-20', 'waktu' => '09:00:00', 'tempat' => 'Balai Warga', 'kategori' => 'sosial', 'deskripsi' => 'Pengobatan gratis untuk warga tidak mampu bekerja sama dengan Puskesmas.', 'status' => 'akan_datang'],
            ['judul' => 'Bansos Kelurahan', 'tanggal' => '2026-04-25', 'waktu' => '10:00:00', 'tempat' => 'Kantor Kelurahan', 'kategori' => 'sosial', 'deskripsi' => 'Pembagian bantuan sosial sembako untuk warga kurang mampu.', 'status' => 'selesai'],
            ['judul' => 'Yasinan dan Tahlilan', 'tanggal' => '2026-05-29', 'waktu' => '19:30:00', 'tempat' => 'Masjid Al-Barakah', 'kategori' => 'ibadah', 'deskripsi' => 'Yasinan dan tahlilan rutin setiap malam Jumat.', 'status' => 'akan_datang'],
        ];

        foreach ($data as $item) {
            Agenda::create($item);
        }
    }
}
