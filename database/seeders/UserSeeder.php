<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Ketua RT 01',
            'email' => 'ketua@rt01.test',
            'password' => 'password',
        ]);

        User::create([
            'name' => 'Ketua DKM',
            'email' => 'ketua@masjid.test',
            'password' => 'password',
        ]);

        User::create([
            'name' => 'Admin SMARTA',
            'email' => 'admin@smarta.test',
            'password' => 'password',
        ]);
    }
}
