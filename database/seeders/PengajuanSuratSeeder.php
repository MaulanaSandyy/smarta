<?php

namespace Database\Seeders;

use App\Models\PengajuanSurat;
use Illuminate\Database\Seeder;

class PengajuanSuratSeeder extends Seeder
{
    public function run(): void
    {
        PengajuanSurat::whereNotNull('id')->delete();

        $data = [
            ['warga_id' => 1, 'jenis_surat' => 'SKTM', 'nomor_surat' => '474/001/SKTM/2026', 'keperluan' => 'Persyaratan pendaftaran anak sekolah', 'keterangan' => 'Anak membutuhkan SKTM untuk beasiswa', 'status' => 'selesai', 'catatan' => 'Dokumen lengkap', 'tanggal_pengajuan' => '2026-01-10', 'tanggal_selesai' => '2026-01-12'],
            ['warga_id' => 2, 'jenis_surat' => 'SKU', 'nomor_surat' => '503/002/SKU/2026', 'keperluan' => 'Pembuatan izin usaha warung', 'keterangan' => 'Usaha kuliner skala kecil', 'status' => 'selesai', 'catatan' => null, 'tanggal_pengajuan' => '2026-01-15', 'tanggal_selesai' => '2026-01-18'],
            ['warga_id' => 3, 'jenis_surat' => 'SKK', 'nomor_surat' => null, 'keperluan' => 'Pindah alamat domisili', 'keterangan' => 'Pindah dari Jakarta', 'status' => 'diproses', 'catatan' => 'Sedang diverifikasi', 'tanggal_pengajuan' => '2026-02-01', 'tanggal_selesai' => null],
            ['warga_id' => 4, 'jenis_surat' => 'Surat Keterangan', 'nomor_surat' => null, 'keperluan' => 'Keterangan penghasilan untuk KPR', 'keterangan' => 'Membutuhkan surat keterangan penghasilan', 'status' => 'menunggu', 'catatan' => null, 'tanggal_pengajuan' => '2026-02-10', 'tanggal_selesai' => null],
            ['warga_id' => 5, 'jenis_surat' => 'Surat Pengantar', 'nomor_surat' => '474/005/SP/2026', 'keperluan' => 'Pembuatan KTP baru', 'keterangan' => 'KTP hilang', 'status' => 'selesai', 'catatan' => 'Persyaratan lengkap', 'tanggal_pengajuan' => '2026-02-14', 'tanggal_selesai' => '2026-02-14'],
            ['warga_id' => 6, 'jenis_surat' => 'SKTM', 'nomor_surat' => null, 'keperluan' => 'Keringanan biaya rumah sakit', 'keterangan' => 'Anggota keluarga sakit', 'status' => 'diproses', 'catatan' => 'Menunggu verifikasi RT', 'tanggal_pengajuan' => '2026-02-20', 'tanggal_selesai' => null],
            ['warga_id' => 7, 'jenis_surat' => 'SKU', 'nomor_surat' => '503/007/SKU/2026', 'keperluan' => 'Pembuatan izin usaha bengkel', 'keterangan' => 'Bengkel motor skala kecil', 'status' => 'selesai', 'catatan' => null, 'tanggal_pengajuan' => '2026-03-01', 'tanggal_selesai' => '2026-03-05'],
            ['warga_id' => 8, 'jenis_surat' => 'Surat Keterangan', 'nomor_surat' => null, 'keperluan' => 'Keterangan domisili perusahaan', 'keterangan' => 'Untuk pendaftaran PT', 'status' => 'ditolak', 'catatan' => 'Dokumen tidak lengkap', 'tanggal_pengajuan' => '2026-03-10', 'tanggal_selesai' => '2026-03-12'],
            ['warga_id' => 9, 'jenis_surat' => 'Surat Pengantar', 'nomor_surat' => '474/009/SP/2026', 'keperluan' => 'Pembuatan KK baru', 'keterangan' => 'Baru menikah', 'status' => 'selesai', 'catatan' => null, 'tanggal_pengajuan' => '2026-03-15', 'tanggal_selesai' => '2026-03-15'],
            ['warga_id' => 10, 'jenis_surat' => 'SKK', 'nomor_surat' => '474/010/SKK/2026', 'keperluan' => 'Pindah domisili keluar kota', 'keterangan' => 'Pindah kerja ke Surabaya', 'status' => 'selesai', 'catatan' => 'Proses cepat', 'tanggal_pengajuan' => '2026-03-20', 'tanggal_selesai' => '2026-03-22'],
            ['warga_id' => 12, 'jenis_surat' => 'SKTM', 'nomor_surat' => null, 'keperluan' => 'Bantuan sosial', 'keterangan' => 'Mendapatkan bantuan sembako', 'status' => 'menunggu', 'catatan' => null, 'tanggal_pengajuan' => '2026-04-01', 'tanggal_selesai' => null],
            ['warga_id' => 14, 'jenis_surat' => 'Surat Pengantar', 'nomor_surat' => '474/012/SP/2026', 'keperluan' => 'Pembuatan SIM', 'keterangan' => 'SIM habis masa berlaku', 'status' => 'selesai', 'catatan' => null, 'tanggal_pengajuan' => '2026-04-05', 'tanggal_selesai' => '2026-04-05'],
            ['warga_id' => 16, 'jenis_surat' => 'SKU', 'nomor_surat' => null, 'keperluan' => 'Izin usaha warung makan', 'keterangan' => 'Buka warung makan baru', 'status' => 'diproses', 'catatan' => 'Diverifikasi', 'tanggal_pengajuan' => '2026-04-10', 'tanggal_selesai' => null],
            ['warga_id' => 20, 'jenis_surat' => 'Surat Keterangan', 'nomor_surat' => '474/014/SK/2026', 'keperluan' => 'Keterangan belum memiliki rumah', 'keterangan' => 'Syarat mengajukan KPR subsidi', 'status' => 'selesai', 'catatan' => 'Data sesuai', 'tanggal_pengajuan' => '2026-04-15', 'tanggal_selesai' => '2026-04-17'],
            ['warga_id' => 22, 'jenis_surat' => 'Surat Pengantar', 'nomor_surat' => null, 'keperluan' => 'Pengurusan akta kelahiran anak', 'keterangan' => 'Anak baru lahir', 'status' => 'menunggu', 'catatan' => 'Menunggu dokumen pendukung', 'tanggal_pengajuan' => '2026-05-01', 'tanggal_selesai' => null],
        ];

        foreach ($data as $item) {
            PengajuanSurat::create($item);
        }
    }
}
