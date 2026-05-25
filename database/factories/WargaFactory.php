<?php

namespace Database\Factories;

use App\Models\Warga;
use Illuminate\Database\Eloquent\Factories\Factory;

class WargaFactory extends Factory
{
    protected $model = Warga::class;

    public function definition(): array
    {
        return [
            'nik' => fake()->numerify('################'),
            'kk' => fake()->numerify('################'),
            'nama' => fake()->name(),
            'tempat_lahir' => fake()->city(),
            'tanggal_lahir' => fake()->date(),
            'jenis_kelamin' => fake()->randomElement(['L', 'P']),
            'alamat' => fake()->address(),
            'rt' => '01',
            'rw' => '01',
            'kelurahan' => fake()->streetSuffix(),
            'kecamatan' => fake()->streetSuffix(),
            'kota' => fake()->city(),
            'provinsi' => fake()->state(),
            'agama' => fake()->randomElement(['Islam', 'Kristen', 'Hindu', 'Budha', 'Katolik']),
            'pekerjaan' => fake()->jobTitle(),
            'pendidikan' => fake()->randomElement(['SD', 'SMP', 'SMA', 'D3', 'S1', 'S2', 'S3']),
            'status_warga' => fake()->randomElement(['tetap', 'kontrakan', 'kos']),
            'status_keluarga' => fake()->randomElement(['kepala', 'istri', 'anak', 'lainnya']),
            'telepon' => fake()->phoneNumber(),
            'email' => fake()->optional()->email(),
            'aktif' => true,
        ];
    }
}
