<?php

namespace Database\Seeders;

use App\Models\Laporan;
use Illuminate\Database\Seeder;

class LaporanSeeder extends Seeder
{
    public function run(): void
    {
        Laporan::whereNotNull('id')->delete();

        $data = [
            ['warga_id' => 1, 'judul' => 'Lampu Jalan Mati', 'isi' => 'Lampu penerangan jalan di depan rumah RT 01 sudah 3 hari tidak menyala. Mohon segera diperbaiki karena membahayakan pengguna jalan.', 'kategori' => 'infrastruktur', 'status' => 'selesai', 'tanggapan' => 'Lampu sudah diperbaiki pada tanggal 12 Mei 2026.', 'tanggal_laporan' => '2026-05-08', 'tanggal_ditanggapi' => '2026-05-12'],
            ['warga_id' => 3, 'judul' => 'Selokan Tersumbat', 'isi' => 'Selokan di belakang rumah mengalami penyumbatan dan menimbulkan bau tidak sedap. Mohon dilakukan pembersihan.', 'kategori' => 'infrastruktur', 'status' => 'diproses', 'tanggapan' => 'Sedang dijadwalkan pembersihan.', 'tanggal_laporan' => '2026-05-10', 'tanggal_ditanggapi' => '2026-05-11'],
            ['warga_id' => 5, 'judul' => 'Kegiatan Posyandu', 'isi' => 'Posyandu bulan ini berjalan lancar. Total balita yang hadir 25 anak. Imunisasi lengkap.', 'kategori' => 'sosial', 'status' => 'selesai', 'tanggapan' => 'Terima kasih laporannya.', 'tanggal_laporan' => '2026-05-06', 'tanggal_ditanggapi' => '2026-05-07'],
            ['warga_id' => 7, 'judul' => 'Kehilangan Sepeda Motor', 'isi' => 'Warga melaporkan kehilangan sepeda motor parkir di depan rumah pada malam hari. Mohon peningkatan keamanan lingkungan.', 'kategori' => 'keamanan', 'status' => 'menunggu', 'tanggapan' => null, 'tanggal_laporan' => '2026-05-15', 'tanggal_ditanggapi' => null],
            ['warga_id' => 9, 'judul' => 'Fasilitas Olahraga Rusak', 'isi' => 'Tiang basket di lapangan olahraga mulai rusak dan berkarat. Dikhawatirkan membahayakan anak-anak yang bermain.', 'kategori' => 'infrastruktur', 'status' => 'diproses', 'tanggapan' => 'Sudah dicatat untuk perbaikan.', 'tanggal_laporan' => '2026-04-28', 'tanggal_ditanggapi' => '2026-04-30'],
            ['warga_id' => 12, 'judul' => 'Kebisingan Pabrik', 'isi' => 'Pabrik di sebelah timur sering mengeluarkan suara bising pada malam hari, mengganggu istirahat warga.', 'kategori' => 'umum', 'status' => 'dibatalkan', 'tanggapan' => 'Sudah dikoordinasikan dengan pihak pabrik.', 'tanggal_laporan' => '2026-04-20', 'tanggal_ditanggapi' => '2026-04-25'],
            ['warga_id' => 14, 'judul' => 'Pohon Tumbang', 'isi' => 'Pohon di pinggir jalan dekat SD Negeri 01 tumbang akibat angin kencang. Menghalangi akses jalan.', 'kategori' => 'infrastruktur', 'status' => 'selesai', 'tanggapan' => 'Pohon sudah dievakuasi oleh petugas.', 'tanggal_laporan' => '2026-04-15', 'tanggal_ditanggapi' => '2026-04-16'],
            ['warga_id' => 16, 'judul' => 'Pengajuan Bantuan Sembako', 'isi' => 'Melaporkan kondisi ekonomi warga yang kurang mampu di RT 01/RW 01 untuk mendapatkan bantuan sembako.', 'kategori' => 'sosial', 'status' => 'selesai', 'tanggapan' => 'Data sudah diterima dan akan diproses.', 'tanggal_laporan' => '2026-04-10', 'tanggal_ditanggapi' => '2026-04-12'],
            ['warga_id' => 20, 'judul' => 'Parkir Sembarangan', 'isi' => 'Banyak kendaraan parkir di pinggir jalan utama sehingga menyempitkan akses jalan. Mohon penertiban.', 'kategori' => 'keamanan', 'status' => 'diproses', 'tanggapan' => 'Akan dipasang rambu larangan parkir.', 'tanggal_laporan' => '2026-05-02', 'tanggal_ditanggapi' => '2026-05-04'],
            ['warga_id' => 22, 'judul' => 'Sampah Menumpuk', 'isi' => 'Tempat pembuangan sampah sementara sudah penuh dan tidak diangkut selama 1 minggu. Menimbulkan bau.', 'kategori' => 'umum', 'status' => 'menunggu', 'tanggapan' => null, 'tanggal_laporan' => '2026-05-18', 'tanggal_ditanggapi' => null],
        ];

        foreach ($data as $item) {
            Laporan::create($item);
        }
    }
}
