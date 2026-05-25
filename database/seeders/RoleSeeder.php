<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // === PERMISSIONS ===
        $rtPermissions = [
            'rt.dashboard', 'rt.data-warga', 'rt.surat', 'rt.informasi',
            'rt.iuran', 'rt.laporan', 'rt.agenda', 'rt.kas',
            'rt.ronda', 'rt.direktori', 'rt.kalender', 'rt.portal-kos',
        ];

        $masjidPermissions = [
            'masjid.dashboard', 'masjid.jamaah', 'masjid.keuangan', 'masjid.donasi',
            'masjid.kajian', 'masjid.inventaris', 'masjid.kalender', 'masjid.galeri',
        ];

        $allPermissions = [...$rtPermissions, ...$masjidPermissions];

        foreach ($allPermissions as $perm) {
            Permission::firstOrCreate(['name' => $perm]);
        }

        // === ROLES RT ===
        $superAdmin = Role::firstOrCreate(['name' => 'Super Admin']);
        $superAdmin->syncPermissions($allPermissions);

        $ketuaRT = Role::firstOrCreate(['name' => 'Ketua RT']);
        $ketuaRT->syncPermissions($rtPermissions);

        $sekretaris = Role::firstOrCreate(['name' => 'Sekretaris RT']);
        $sekretaris->syncPermissions(['rt.dashboard', 'rt.surat', 'rt.informasi', 'rt.agenda', 'rt.direktori', 'rt.kalender']);

        $bendahara = Role::firstOrCreate(['name' => 'Bendahara RT']);
        $bendahara->syncPermissions(['rt.dashboard', 'rt.iuran', 'rt.kas', 'rt.laporan']);

        $koordinator = Role::firstOrCreate(['name' => 'Koordinator Keamanan']);
        $koordinator->syncPermissions(['rt.dashboard', 'rt.ronda', 'rt.laporan', 'rt.kalender']);

        $operator = Role::firstOrCreate(['name' => 'Operator RT']);
        $operator->syncPermissions(['rt.dashboard', 'rt.data-warga', 'rt.surat', 'rt.informasi', 'rt.portal-kos']);

        Role::firstOrCreate(['name' => 'Penduduk Tetap']);
        Role::firstOrCreate(['name' => 'Penghuni Kontrakan']);
        Role::firstOrCreate(['name' => 'Pemilik Kontrakan']);

        // === ROLES MASJID ===
        $ketuaDKM = Role::firstOrCreate(['name' => 'Ketua DKM']);
        $ketuaDKM->syncPermissions($masjidPermissions);

        $sekretarisDKM = Role::firstOrCreate(['name' => 'Sekretaris DKM']);
        $sekretarisDKM->syncPermissions(['masjid.dashboard', 'masjid.jamaah', 'masjid.galeri', 'masjid.kajian']);

        $bendaharaMasjid = Role::firstOrCreate(['name' => 'Bendahara Masjid']);
        $bendaharaMasjid->syncPermissions(['masjid.dashboard', 'masjid.keuangan', 'masjid.donasi']);

        $ustad = Role::firstOrCreate(['name' => 'Ustad']);
        $ustad->syncPermissions(['masjid.dashboard', 'masjid.kajian', 'masjid.kalender']);

        $marbot = Role::firstOrCreate(['name' => 'Marbot']);
        $marbot->syncPermissions(['masjid.dashboard', 'masjid.inventaris', 'masjid.kalender']);

        $amil = Role::firstOrCreate(['name' => 'Amil Zakat']);
        $amil->syncPermissions(['masjid.dashboard', 'masjid.donasi', 'masjid.keuangan']);

        Role::firstOrCreate(['name' => 'Panitia Qurban']);
        Role::firstOrCreate(['name' => 'Jamaah']);

        // === ASSIGN ROLES TO USERS ===
        User::where('email', 'ketua@rt01.test')->first()?->assignRole('Ketua RT');
        User::where('email', 'ketua@masjid.test')->first()?->assignRole('Ketua DKM');
        User::where('email', 'admin@smarta.test')->first()?->assignRole('Super Admin');
    }
}
