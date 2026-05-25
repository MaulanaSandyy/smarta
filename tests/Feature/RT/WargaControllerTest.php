<?php

namespace Tests\Feature\RT;

use App\Models\User;
use App\Models\Warga;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WargaControllerTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
    }

    public function test_guest_cannot_access_warga_index(): void
    {
        $response = $this->get(route('rt.data-warga.index'));

        $response->assertRedirect(route('login'));
    }

    public function test_guest_cannot_access_warga_create(): void
    {
        $response = $this->get(route('rt.data-warga.create'));

        $response->assertRedirect(route('login'));
    }

    public function test_guest_cannot_store_warga(): void
    {
        $response = $this->post(route('rt.data-warga.store'), []);

        $response->assertRedirect(route('login'));
    }

    public function test_guest_cannot_edit_warga(): void
    {
        $warga = Warga::factory()->create();

        $response = $this->get(route('rt.data-warga.edit', $warga));

        $response->assertRedirect(route('login'));
    }

    public function test_guest_cannot_update_warga(): void
    {
        $warga = Warga::factory()->create();

        $response = $this->put(route('rt.data-warga.update', $warga), []);

        $response->assertRedirect(route('login'));
    }

    public function test_guest_cannot_destroy_warga(): void
    {
        $warga = Warga::factory()->create();

        $response = $this->delete(route('rt.data-warga.destroy', $warga));

        $response->assertRedirect(route('login'));
    }

    public function test_index_displays_paginated_warga(): void
    {
        Warga::factory()->count(15)->create();

        $response = $this->actingAs($this->user)->get(route('rt.data-warga.index'));

        $response->assertOk();
        $response->assertViewHas('warga');
    }

    public function test_store_creates_new_warga(): void
    {
        $data = [
            'nik' => '3273010101900001',
            'kk' => '3273010101900001',
            'nama' => 'Agus Supriyadi',
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => '1990-01-01',
            'jenis_kelamin' => 'L',
            'alamat' => 'Jl. Merdeka No. 1',
            'rt' => '01',
            'rw' => '01',
            'kelurahan' => 'Kelurahan Contoh',
            'kecamatan' => 'Kecamatan Contoh',
            'kota' => 'Kota Contoh',
            'provinsi' => 'Provinsi Contoh',
            'agama' => 'Islam',
            'pekerjaan' => 'Pegawai Negeri Sipil',
            'pendidikan' => 'S1',
            'status_warga' => 'tetap',
            'status_keluarga' => 'kepala',
            'telepon' => '081234567890',
            'email' => 'agus@email.com',
            'aktif' => true,
        ];

        $response = $this->actingAs($this->user)->post(route('rt.data-warga.store'), $data);

        $response->assertRedirect(route('rt.data-warga.index'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('wargas', [
            'nik' => '3273010101900001',
            'nama' => 'Agus Supriyadi',
        ]);
    }

    public function test_store_validates_required_fields(): void
    {
        $response = $this->actingAs($this->user)->post(route('rt.data-warga.store'), []);

        $response->assertSessionHasErrors([
            'nik', 'kk', 'nama', 'tempat_lahir', 'tanggal_lahir',
            'jenis_kelamin', 'alamat', 'rt', 'rw', 'kelurahan',
            'kecamatan', 'kota', 'provinsi', 'agama', 'pekerjaan',
            'pendidikan', 'status_warga', 'status_keluarga',
        ]);
    }

    public function test_store_validates_nik_uniqueness(): void
    {
        Warga::factory()->create(['nik' => '3273010101900001']);

        $response = $this->actingAs($this->user)->post(route('rt.data-warga.store'), [
            'nik' => '3273010101900001',
            'kk' => '3273010101900002',
            'nama' => 'Test',
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => '1990-01-01',
            'jenis_kelamin' => 'L',
            'alamat' => 'Jl. Test',
            'rt' => '01',
            'rw' => '01',
            'kelurahan' => 'Kel',
            'kecamatan' => 'Kec',
            'kota' => 'Kota',
            'provinsi' => 'Prov',
            'agama' => 'Islam',
            'pekerjaan' => 'Test',
            'pendidikan' => 'S1',
            'status_warga' => 'tetap',
            'status_keluarga' => 'kepala',
        ]);

        $response->assertSessionHasErrors('nik');
    }

    public function test_store_validates_nik_length(): void
    {
        $response = $this->actingAs($this->user)->post(route('rt.data-warga.store'), [
            'nik' => '123',
            'kk' => '3273010101900002',
            'nama' => 'Test',
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => '1990-01-01',
            'jenis_kelamin' => 'L',
            'alamat' => 'Jl. Test',
            'rt' => '01',
            'rw' => '01',
            'kelurahan' => 'Kel',
            'kecamatan' => 'Kec',
            'kota' => 'Kota',
            'provinsi' => 'Prov',
            'agama' => 'Islam',
            'pekerjaan' => 'Test',
            'pendidikan' => 'S1',
            'status_warga' => 'tetap',
            'status_keluarga' => 'kepala',
        ]);

        $response->assertSessionHasErrors('nik');
    }

    public function test_store_validates_jenis_kelamin_value(): void
    {
        $response = $this->actingAs($this->user)->post(route('rt.data-warga.store'), [
            'nik' => '3273010101900001',
            'kk' => '3273010101900001',
            'nama' => 'Test',
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => '1990-01-01',
            'jenis_kelamin' => 'X',
            'alamat' => 'Jl. Test',
            'rt' => '01',
            'rw' => '01',
            'kelurahan' => 'Kel',
            'kecamatan' => 'Kec',
            'kota' => 'Kota',
            'provinsi' => 'Prov',
            'agama' => 'Islam',
            'pekerjaan' => 'Test',
            'pendidikan' => 'S1',
            'status_warga' => 'tetap',
            'status_keluarga' => 'kepala',
        ]);

        $response->assertSessionHasErrors('jenis_kelamin');
    }

    public function test_update_modifies_warga(): void
    {
        $warga = Warga::factory()->create([
            'nama' => 'Nama Lama',
        ]);

        $response = $this->actingAs($this->user)->put(route('rt.data-warga.update', $warga), [
            'nik' => $warga->nik,
            'kk' => $warga->kk,
            'nama' => 'Nama Baru',
            'tempat_lahir' => $warga->tempat_lahir,
            'tanggal_lahir' => $warga->tanggal_lahir,
            'jenis_kelamin' => $warga->jenis_kelamin,
            'alamat' => $warga->alamat,
            'rt' => $warga->rt,
            'rw' => $warga->rw,
            'kelurahan' => $warga->kelurahan,
            'kecamatan' => $warga->kecamatan,
            'kota' => $warga->kota,
            'provinsi' => $warga->provinsi,
            'agama' => $warga->agama,
            'pekerjaan' => $warga->pekerjaan,
            'pendidikan' => $warga->pendidikan,
            'status_warga' => $warga->status_warga,
            'status_keluarga' => $warga->status_keluarga,
            'telepon' => $warga->telepon,
            'email' => $warga->email,
            'aktif' => $warga->aktif,
        ]);

        $response->assertRedirect(route('rt.data-warga.index'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('wargas', [
            'id' => $warga->id,
            'nama' => 'Nama Baru',
        ]);
    }

    public function test_update_allows_same_nik(): void
    {
        $warga = Warga::factory()->create(['nik' => '3273010101900001']);

        $response = $this->actingAs($this->user)->put(route('rt.data-warga.update', $warga), [
            'nik' => '3273010101900001',
            'kk' => $warga->kk,
            'nama' => $warga->nama,
            'tempat_lahir' => $warga->tempat_lahir,
            'tanggal_lahir' => $warga->tanggal_lahir,
            'jenis_kelamin' => $warga->jenis_kelamin,
            'alamat' => $warga->alamat,
            'rt' => $warga->rt,
            'rw' => $warga->rw,
            'kelurahan' => $warga->kelurahan,
            'kecamatan' => $warga->kecamatan,
            'kota' => $warga->kota,
            'provinsi' => $warga->provinsi,
            'agama' => $warga->agama,
            'pekerjaan' => $warga->pekerjaan,
            'pendidikan' => $warga->pendidikan,
            'status_warga' => $warga->status_warga,
            'status_keluarga' => $warga->status_keluarga,
            'telepon' => $warga->telepon,
            'email' => $warga->email,
            'aktif' => $warga->aktif,
        ]);

        $response->assertRedirect(route('rt.data-warga.index'));
        $response->assertSessionHas('success');
    }

    public function test_update_rejects_duplicate_nik_from_other_record(): void
    {
        Warga::factory()->create(['nik' => '3273010101900001']);
        $warga = Warga::factory()->create(['nik' => '3273010101900002']);

        $response = $this->actingAs($this->user)->put(route('rt.data-warga.update', $warga), [
            'nik' => '3273010101900001',
            'kk' => $warga->kk,
            'nama' => $warga->nama,
            'tempat_lahir' => $warga->tempat_lahir,
            'tanggal_lahir' => $warga->tanggal_lahir,
            'jenis_kelamin' => $warga->jenis_kelamin,
            'alamat' => $warga->alamat,
            'rt' => $warga->rt,
            'rw' => $warga->rw,
            'kelurahan' => $warga->kelurahan,
            'kecamatan' => $warga->kecamatan,
            'kota' => $warga->kota,
            'provinsi' => $warga->provinsi,
            'agama' => $warga->agama,
            'pekerjaan' => $warga->pekerjaan,
            'pendidikan' => $warga->pendidikan,
            'status_warga' => $warga->status_warga,
            'status_keluarga' => $warga->status_keluarga,
            'telepon' => $warga->telepon,
            'email' => $warga->email,
            'aktif' => $warga->aktif,
        ]);

        $response->assertSessionHasErrors('nik');
    }

    public function test_destroy_deletes_warga(): void
    {
        $warga = Warga::factory()->create();

        $response = $this->actingAs($this->user)->delete(route('rt.data-warga.destroy', $warga));

        $response->assertRedirect(route('rt.data-warga.index'));
        $response->assertSessionHas('success');

        $this->assertDatabaseMissing('wargas', ['id' => $warga->id]);
    }
}
