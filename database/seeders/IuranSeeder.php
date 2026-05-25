<?php

namespace Database\Seeders;

use App\Models\Iuran;
use Illuminate\Database\Seeder;

class IuranSeeder extends Seeder
{
    public function run(): void
    {
        Iuran::whereNotNull('id')->delete();

        $data = [
            ['nama' => 'Kas RT', 'jumlah' => 50000, 'periode' => 'bulanan', 'keterangan' => 'Iuran wajib bulanan untuk kas RT', 'aktif' => true],
            ['nama' => 'Keamanan', 'jumlah' => 30000, 'periode' => 'bulanan', 'keterangan' => 'Iuran keamanan lingkungan', 'aktif' => true],
            ['nama' => 'Kebersihan', 'jumlah' => 25000, 'periode' => 'bulanan', 'keterangan' => 'Iuran kebersihan dan pengelolaan sampah', 'aktif' => true],
            ['nama' => 'Sosial', 'jumlah' => 20000, 'periode' => 'bulanan', 'keterangan' => 'Iuran sosial untuk bantuan warga', 'aktif' => true],
            ['nama' => 'Listrik', 'jumlah' => 15000, 'periode' => 'bulanan', 'keterangan' => 'Iuran listrik fasilitas umum', 'aktif' => true],
        ];

        foreach ($data as $item) {
            Iuran::create($item);
        }
    }
}
