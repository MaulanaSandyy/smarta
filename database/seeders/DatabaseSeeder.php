<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            WargaSeeder::class,
            PengajuanSuratSeeder::class,
            InformasiSeeder::class,
            IuranSeeder::class,
            PembayaranIuranSeeder::class,
            LaporanSeeder::class,
            AgendaSeeder::class,
            KasSeeder::class,
            RondaSeeder::class,
            JadwalRondaSeeder::class,
            LaporanKeamananSeeder::class,
            KalenderEventSeeder::class,
            PortalKoSeeder::class,
            KeuanganMasjidSeeder::class,
            DonasiSeeder::class,
            KajianSeeder::class,
            InventarisMasjidSeeder::class,
            GaleriSeeder::class,
            UserSeeder::class,
            RoleSeeder::class,
        ]);
    }
}
