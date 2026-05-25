<?php

namespace Database\Seeders;

use App\Models\Informasi;
use Illuminate\Database\Seeder;

class InformasiSeeder extends Seeder
{
    public function run(): void
    {
        Informasi::whereNotNull('id')->delete();

        $data = [
            ['judul' => 'Pemberitahuan Rapat RT Bulanan', 'isi' => 'Diberitahukan kepada seluruh warga RT 01/RW 01 bahwa akan diadakan rapat bulanan pada hari Minggu, 10 Juni 2026 pukul 19.00 WIB di Balai Warga. Kehadiran warga sangat diharapkan.', 'kategori' => 'pengumuman', 'penting' => true, 'diterbitkan' => true, 'tanggal_terbit' => '2026-05-01'],
            ['judul' => 'Kegiatan Kerja Bakti', 'isi' => 'Akan diadakan kegiatan kerja bakti membersihkan lingkungan pada hari Sabtu, 2 Juni 2026 pukul 07.00 WIB. Mohon membawa peralatan kebersihan masing-masing.', 'kategori' => 'kegiatan', 'penting' => true, 'diterbitkan' => true, 'tanggal_terbit' => '2026-05-05'],
            ['judul' => 'Jadwal Posyandu Balita', 'isi' => 'Posyandu balita akan dilaksanakan setiap hari Kamis pukul 08.00 - 11.00 WIB di Posyandu Mawar. Bagi ibu-ibu yang memiliki balita diharapkan membawa buku KMS.', 'kategori' => 'umum', 'penting' => false, 'diterbitkan' => true, 'tanggal_terbit' => '2026-05-10'],
            ['judul' => 'Peringatan Dini Cuaca Ekstrem', 'isi' => 'BMKG mengeluarkan peringatan dini cuaca ekstrem untuk wilayah Kota Contoh selama 3 hari ke depan. Mohon warga waspada terhadap angin kencang dan hujan lebat.', 'kategori' => 'darurat', 'penting' => true, 'diterbitkan' => true, 'tanggal_terbit' => '2026-05-12'],
            ['judul' => 'Pengumuman Pemadaman Listrik', 'isi' => 'PLN akan melakukan pemadaman listrik bergilir pada hari Senin, 15 Mei 2026 pukul 09.00 - 15.00 WIB untuk pemeliharaan jaringan.', 'kategori' => 'pengumuman', 'penting' => false, 'diterbitkan' => true, 'tanggal_terbit' => '2026-05-13'],
            ['judul' => 'Pelatihan Pembuatan Pupuk Organik', 'isi' => 'Dinas Pertanian akan mengadakan pelatihan pembuatan pupuk organik gratis untuk warga. Pendaftaran dibuka sampai 20 Mei 2026 di kantor kelurahan.', 'kategori' => 'kegiatan', 'penting' => false, 'diterbitkan' => true, 'tanggal_terbit' => '2026-05-14'],
            ['judul' => 'Vaksinasi Rabies untuk Hewan Peliharaan', 'isi' => 'Puskeswan akan mengadakan vaksinasi rabies gratis untuk kucing dan anjing pada hari Sabtu, 20 Mei 2026 di halaman kantor kelurahan.', 'kategori' => 'umum', 'penting' => false, 'diterbitkan' => true, 'tanggal_terbit' => '2026-05-15'],
            ['judul' => 'Informasi Bantuan Sosial', 'isi' => 'Pemerintah akan menyalurkan bantuan sosial tahap II tahun 2026. Penerima bantuan akan diumumkan melalui surat pemberitahuan.', 'kategori' => 'pengumuman', 'penting' => true, 'diterbitkan' => true, 'tanggal_terbit' => '2026-05-18'],
            ['judul' => 'Jadwal Pembayaran Iuran', 'isi' => 'Pembayaran iuran bulan Juni 2026 akan dimulai tanggal 1-10 Juni 2026. Iuran dapat dibayarkan ke Bendahara RT atau melalui transfer bank.', 'kategori' => 'umum', 'penting' => false, 'diterbitkan' => true, 'tanggal_terbit' => '2026-05-20'],
            ['judul' => 'Peringatan Hari Kemerdekaan', 'isi' => 'Dalam rangka memperingati HUT RI ke-81, akan diadakan berbagai lomba dan kegiatan. Info lebih lanjut akan menyusul.', 'kategori' => 'kegiatan', 'penting' => false, 'diterbitkan' => false, 'tanggal_terbit' => '2026-07-01'],
        ];

        foreach ($data as $item) {
            Informasi::create($item);
        }
    }
}
