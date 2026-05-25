<?php

namespace Database\Seeders;

use App\Models\PortalKo;
use Illuminate\Database\Seeder;

class PortalKoSeeder extends Seeder
{
    public function run(): void
    {
        PortalKo::whereNotNull('id')->delete();

        $data = [
            ['nama' => 'Rina Maharani', 'nik' => '3273010126900026', 'telepon' => '085611223344', 'alamat_kos' => 'Jl. Merdeka No. 10 Kamar 1', 'pemilik' => 'H. Ahmad Subagyo', 'kontak_pemilik' => '081234567890', 'tanggal_masuk' => '2026-01-10', 'tanggal_keluar' => null, 'biaya_sewa' => 750000, 'catatan' => 'Mahasiswi Universitas Contoh', 'aktif' => true],
            ['nama' => 'Dimas Ardiansyah', 'nik' => '3273010127900027', 'telepon' => '085622334455', 'alamat_kos' => 'Jl. Merdeka No. 10 Kamar 2', 'pemilik' => 'H. Ahmad Subagyo', 'kontak_pemilik' => '081234567890', 'tanggal_masuk' => '2026-02-01', 'tanggal_keluar' => null, 'biaya_sewa' => 750000, 'catatan' => 'Karyawan swasta', 'aktif' => true],
            ['nama' => 'Sari Dewi', 'nik' => '3273010128900028', 'telepon' => '085633445566', 'alamat_kos' => 'Jl. Merdeka No. 11 Kamar 1', 'pemilik' => 'Ibu Siti Rahmawati', 'kontak_pemilik' => '081234567891', 'tanggal_masuk' => '2026-01-15', 'tanggal_keluar' => null, 'biaya_sewa' => 500000, 'catatan' => 'Fresh graduate', 'aktif' => true],
            ['nama' => 'Aditya Nugraha', 'nik' => '3273010129900029', 'telepon' => '085644556677', 'alamat_kos' => 'Jl. Merdeka No. 11 Kamar 2', 'pemilik' => 'Ibu Siti Rahmawati', 'kontak_pemilik' => '081234567891', 'tanggal_masuk' => '2026-03-01', 'tanggal_keluar' => null, 'biaya_sewa' => 500000, 'catatan' => 'Magang di perusahaan', 'aktif' => true],
            ['nama' => 'Putri Anggraini', 'nik' => '3273010130900030', 'telepon' => '085655667788', 'alamat_kos' => 'Jl. Merdeka No. 15 Kamar 1', 'pemilik' => 'Pak Joko Susilo', 'kontak_pemilik' => '081234567892', 'tanggal_masuk' => '2025-08-01', 'tanggal_keluar' => '2026-04-30', 'biaya_sewa' => 800000, 'catatan' => 'Sudah pindah ke luar kota', 'aktif' => false],
            ['nama' => 'Wildan Firdaus', 'nik' => '3273010131900031', 'telepon' => '085666778899', 'alamat_kos' => 'Jl. Merdeka No. 15 Kamar 2', 'pemilik' => 'Pak Joko Susilo', 'kontak_pemilik' => '081234567892', 'tanggal_masuk' => '2026-04-01', 'tanggal_keluar' => null, 'biaya_sewa' => 800000, 'catatan' => 'Pekerja lepas', 'aktif' => true],
            ['nama' => 'Nadia Febriani', 'nik' => '3273010132900032', 'telepon' => '085677889900', 'alamat_kos' => 'Jl. Merdeka No. 20 Kamar 1', 'pemilik' => 'Bpk. Dodi Firmansyah', 'kontak_pemilik' => '081234567893', 'tanggal_masuk' => '2026-01-20', 'tanggal_keluar' => null, 'biaya_sewa' => 1000000, 'catatan' => 'Karyawan bank', 'aktif' => true],
            ['nama' => 'Reza Pahlevi', 'nik' => '3273010133900033', 'telepon' => '085688990011', 'alamat_kos' => 'Jl. Merdeka No. 20 Kamar 2', 'pemilik' => 'Bpk. Dodi Firmansyah', 'kontak_pemilik' => '081234567893', 'tanggal_masuk' => '2026-02-15', 'tanggal_keluar' => null, 'biaya_sewa' => 1000000, 'catatan' => 'Karyawan startup', 'aktif' => true],
            ['nama' => 'Tiara Maharani', 'nik' => '3273010134900034', 'telepon' => '085699001122', 'alamat_kos' => 'Jl. Merdeka No. 25 Kamar 1', 'pemilik' => 'Bu Rina Wijaya', 'kontak_pemilik' => '081234567894', 'tanggal_masuk' => '2025-12-01', 'tanggal_keluar' => null, 'biaya_sewa' => 1500000, 'catatan' => 'Kos premium terminator', 'aktif' => true],
            ['nama' => 'Ardi Setiawan', 'nik' => '3273010135900035', 'telepon' => '085600112233', 'alamat_kos' => 'Jl. Merdeka No. 25 Kamar 2', 'pemilik' => 'Bu Rina Wijaya', 'kontak_pemilik' => '081234567894', 'tanggal_masuk' => '2026-01-01', 'tanggal_keluar' => '2026-05-15', 'biaya_sewa' => 1500000, 'catatan' => 'Pindah karena pekerjaan', 'aktif' => false],
        ];

        foreach ($data as $item) {
            PortalKo::create($item);
        }
    }
}
