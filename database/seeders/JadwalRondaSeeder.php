<?php

namespace Database\Seeders;

use App\Models\JadwalRonda;
use Illuminate\Database\Seeder;

class JadwalRondaSeeder extends Seeder
{
    public function run(): void
    {
        JadwalRonda::whereNotNull('id')->delete();

        $data = [
            ['ronda_id' => 1, 'warga_id' => 1, 'hari' => 'Senin', 'waktu' => '22:00:00', 'pos' => 'Pos 1', 'tanggal' => '2026-05-04', 'hadir' => true],
            ['ronda_id' => 1, 'warga_id' => 3, 'hari' => 'Senin', 'waktu' => '23:00:00', 'pos' => 'Pos 1', 'tanggal' => '2026-05-04', 'hadir' => true],
            ['ronda_id' => 1, 'warga_id' => 5, 'hari' => 'Selasa', 'waktu' => '22:00:00', 'pos' => 'Pos 2', 'tanggal' => '2026-05-05', 'hadir' => true],
            ['ronda_id' => 1, 'warga_id' => 7, 'hari' => 'Selasa', 'waktu' => '23:00:00', 'pos' => 'Pos 2', 'tanggal' => '2026-05-05', 'hadir' => false],
            ['ronda_id' => 1, 'warga_id' => 9, 'hari' => 'Rabu', 'waktu' => '22:00:00', 'pos' => 'Pos 3', 'tanggal' => '2026-05-06', 'hadir' => true],
            ['ronda_id' => 1, 'warga_id' => 12, 'hari' => 'Rabu', 'waktu' => '23:00:00', 'pos' => 'Pos 3', 'tanggal' => '2026-05-06', 'hadir' => true],
            ['ronda_id' => 2, 'warga_id' => 2, 'hari' => 'Senin', 'waktu' => '09:00:00', 'pos' => 'Pos Utama', 'tanggal' => '2026-05-04', 'hadir' => true],
            ['ronda_id' => 2, 'warga_id' => 4, 'hari' => 'Selasa', 'waktu' => '09:00:00', 'pos' => 'Pos Utama', 'tanggal' => '2026-05-05', 'hadir' => true],
            ['ronda_id' => 2, 'warga_id' => 6, 'hari' => 'Rabu', 'waktu' => '09:00:00', 'pos' => 'Pos Utama', 'tanggal' => '2026-05-06', 'hadir' => null],
            ['ronda_id' => 2, 'warga_id' => 8, 'hari' => 'Kamis', 'waktu' => '09:00:00', 'pos' => 'Pos 1', 'tanggal' => '2026-05-07', 'hadir' => true],
            ['ronda_id' => 2, 'warga_id' => 10, 'hari' => 'Jumat', 'waktu' => '09:00:00', 'pos' => 'Pos 1', 'tanggal' => '2026-05-08', 'hadir' => false],
            ['ronda_id' => 3, 'warga_id' => 14, 'hari' => 'Sabtu', 'waktu' => '04:00:00', 'pos' => 'Pos 2', 'tanggal' => '2026-05-09', 'hadir' => true],
            ['ronda_id' => 3, 'warga_id' => 16, 'hari' => 'Sabtu', 'waktu' => '04:00:00', 'pos' => 'Pos 2', 'tanggal' => '2026-05-09', 'hadir' => true],
            ['ronda_id' => 3, 'warga_id' => 18, 'hari' => 'Minggu', 'waktu' => '04:00:00', 'pos' => 'Pos 3', 'tanggal' => '2026-05-10', 'hadir' => null],
            ['ronda_id' => 3, 'warga_id' => 20, 'hari' => 'Minggu', 'waktu' => '04:00:00', 'pos' => 'Pos 3', 'tanggal' => '2026-05-10', 'hadir' => true],
            ['ronda_id' => 4, 'warga_id' => 22, 'hari' => 'Minggu', 'waktu' => '07:00:00', 'pos' => 'Pos Utama', 'tanggal' => '2026-05-10', 'hadir' => true],
            ['ronda_id' => 4, 'warga_id' => 24, 'hari' => 'Minggu', 'waktu' => '07:00:00', 'pos' => 'Pos 1', 'tanggal' => '2026-05-10', 'hadir' => true],
            ['ronda_id' => 1, 'warga_id' => 1, 'hari' => 'Senin', 'waktu' => '22:00:00', 'pos' => 'Pos 1', 'tanggal' => '2026-05-11', 'hadir' => null],
            ['ronda_id' => 1, 'warga_id' => 7, 'hari' => 'Kamis', 'waktu' => '22:00:00', 'pos' => 'Pos Utama', 'tanggal' => '2026-05-14', 'hadir' => true],
            ['ronda_id' => 2, 'warga_id' => 14, 'hari' => 'Sabtu', 'waktu' => '09:00:00', 'pos' => 'Pos 2', 'tanggal' => '2026-05-16', 'hadir' => null],
        ];

        foreach ($data as $item) {
            JadwalRonda::create($item);
        }
    }
}
