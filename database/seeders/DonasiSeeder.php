<?php

namespace Database\Seeders;

use App\Models\Donasi;
use Illuminate\Database\Seeder;

class DonasiSeeder extends Seeder
{
    public function run(): void
    {
        Donasi::whereNotNull('id')->delete();

        $data = [
            ['donatur' => 'H. Ahmad Subagyo', 'tanggal' => '2026-04-02', 'jenis' => 'donasi', 'jumlah' => 1000000, 'status' => 'dikonfirmasi', 'keterangan' => 'Donasi untuk pembangunan masjid', 'bukti' => null],
            ['donatur' => 'Ibu Siti Rahmawati', 'tanggal' => '2026-04-05', 'jenis' => 'zakat', 'jumlah' => 2500000, 'status' => 'dikonfirmasi', 'keterangan' => 'Zakat fitrah keluarga', 'bukti' => null],
            ['donatur' => 'PT Berkah Abadi', 'tanggal' => '2026-04-08', 'jenis' => 'donasi', 'jumlah' => 5000000, 'status' => 'dikonfirmasi', 'keterangan' => 'CSR perusahaan untuk kegiatan sosial', 'bukti' => null],
            ['donatur' => 'Bapak Joko Susilo', 'tanggal' => '2026-04-10', 'jenis' => 'infaq', 'jumlah' => 300000, 'status' => 'tercatat', 'keterangan' => 'Infaq Jumat', 'bukti' => null],
            ['donatur' => 'Ibu Rina Wijaya', 'tanggal' => '2026-04-12', 'jenis' => 'sedekah', 'jumlah' => 200000, 'status' => 'dikonfirmasi', 'keterangan' => 'Sedekah untuk anak yatim', 'bukti' => null],
            ['donatur' => 'Kelompok Pengajian Ibu-Ibu', 'tanggal' => '2026-04-15', 'jenis' => 'donasi', 'jumlah' => 1500000, 'status' => 'disalurkan', 'keterangan' => 'Donasi untuk korban bencana alam', 'bukti' => null],
            ['donatur' => 'H. Ahmad Subagyo', 'tanggal' => '2026-04-18', 'jenis' => 'qurban', 'jumlah' => 3500000, 'status' => 'disalurkan', 'keterangan' => 'Hewan qurban Idul Adha', 'bukti' => null],
            ['donatur' => 'PT Maju Bersama', 'tanggal' => '2026-04-20', 'jenis' => 'donasi', 'jumlah' => 2000000, 'status' => 'dikonfirmasi', 'keterangan' => 'Bantuan operasional masjid', 'bukti' => null],
            ['donatur' => 'Anonim', 'tanggal' => '2026-04-22', 'jenis' => 'infaq', 'jumlah' => 100000, 'status' => 'tercatat', 'keterangan' => 'Kotak amal masjid', 'bukti' => null],
            ['donatur' => 'Bapak Deni Nugroho', 'tanggal' => '2026-04-25', 'jenis' => 'zakat', 'jumlah' => 1500000, 'status' => 'dikonfirmasi', 'keterangan' => 'Zakat mal', 'bukti' => null],
            ['donatur' => 'Ibu Fitri Handayani', 'tanggal' => '2026-04-28', 'jenis' => 'sedekah', 'jumlah' => 500000, 'status' => 'dikonfirmasi', 'keterangan' => 'Sedekah untuk pembangunan sekolah', 'bukti' => null],
            ['donatur' => 'Warga RT 01', 'tanggal' => '2026-05-01', 'jenis' => 'donasi', 'jumlah' => 3200000, 'status' => 'disalurkan', 'keterangan' => 'Donasi gabungan untuk renovasi mushola', 'bukti' => null],
            ['donatur' => 'Bapak Agus Supriyadi', 'tanggal' => '2026-05-05', 'jenis' => 'infaq', 'jumlah' => 250000, 'status' => 'tercatat', 'keterangan' => 'Infaq rutin setiap Jumat', 'bukti' => null],
            ['donatur' => 'Ibu Siti Nurhaliza', 'tanggal' => '2026-05-08', 'jenis' => 'sedekah', 'jumlah' => 150000, 'status' => 'dikonfirmasi', 'keterangan' => 'Sedekah untuk fakir miskin', 'bukti' => null],
            ['donatur' => 'Bapak Ahmad Fauzi', 'tanggal' => '2026-05-10', 'jenis' => 'zakat', 'jumlah' => 3000000, 'status' => 'dikonfirmasi', 'keterangan' => 'Zakat mal tahunan', 'bukti' => null],
        ];

        foreach ($data as $item) {
            Donasi::create($item);
        }
    }
}
