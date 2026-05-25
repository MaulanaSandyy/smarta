<?php

namespace Database\Seeders;

use App\Models\Ronda;
use Illuminate\Database\Seeder;

class RondaSeeder extends Seeder
{
    public function run(): void
    {
        Ronda::whereNotNull('id')->delete();

        $data = [
            ['nama' => 'Ronda Malam', 'deskripsi' => 'Ronda keamanan malam hari mulai pukul 22.00 - 05.00 WIB. Dilakukan secara bergilir oleh warga RT 01.', 'aktif' => true],
            ['nama' => 'Ronda Siang', 'deskripsi' => 'Ronda keamanan siang hari mulai pukul 09.00 - 17.00 WIB. Khusus untuk warga yang tidak bekerja shift malam.', 'aktif' => true],
            ['nama' => 'Ronda Subuh', 'deskripsi' => 'Ronda keamanan subuh hari mulai pukul 04.00 - 06.00 WIB. Dilaksanakan setelah shalat subuh.', 'aktif' => true],
            ['nama' => 'Ronda Mingguan', 'deskripsi' => 'Ronda keliling lingkungan setiap hari Minggu pagi untuk memeriksa kondisi lingkungan secara menyeluruh.', 'aktif' => true],
        ];

        foreach ($data as $item) {
            Ronda::create($item);
        }
    }
}
