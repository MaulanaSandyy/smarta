<x-layouts.rt>
    <x-slot:title>Tambah Data Warga</x-slot:title>
    <x-slot:subtitle>Lengkapi data warga baru</x-slot:subtitle>

    <div class="max-w-2xl">
        <x-ui.card>
            <form action="{{ route('rt.data-warga.store') }}" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">NIK <span class="text-rose-500">*</span></label>
                    <input type="text" name="nik" class="input w-full" value="{{ old('nik') }}" maxlength="16">
                    @error('nik')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">KK <span class="text-rose-500">*</span></label>
                    <input type="text" name="kk" class="input w-full" value="{{ old('kk') }}" maxlength="16">
                    @error('kk')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Nama <span class="text-rose-500">*</span></label>
                    <input type="text" name="nama" class="input w-full" value="{{ old('nama') }}" maxlength="255">
                    @error('nama')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Tempat Lahir <span class="text-rose-500">*</span></label>
                    <input type="text" name="tempat_lahir" class="input w-full" value="{{ old('tempat_lahir') }}">
                    @error('tempat_lahir')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Tanggal Lahir <span class="text-rose-500">*</span></label>
                    <input type="date" name="tanggal_lahir" class="input w-full" value="{{ old('tanggal_lahir') }}">
                    @error('tanggal_lahir')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Jenis Kelamin <span class="text-rose-500">*</span></label>
                    <select name="jenis_kelamin" class="input w-full">
                        <option value="">- Pilih -</option>
                        <option value="L" @selected(old('jenis_kelamin') == 'L')>Laki-laki</option>
                        <option value="P" @selected(old('jenis_kelamin') == 'P')>Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Alamat <span class="text-rose-500">*</span></label>
                    <textarea name="alamat" class="input w-full" rows="4">{{ old('alamat') }}</textarea>
                    @error('alamat')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">RT <span class="text-rose-500">*</span></label>
                    <input type="text" name="rt" class="input w-full" value="{{ old('rt', '01') }}">
                    @error('rt')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">RW <span class="text-rose-500">*</span></label>
                    <input type="text" name="rw" class="input w-full" value="{{ old('rw', '01') }}">
                    @error('rw')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Kelurahan <span class="text-rose-500">*</span></label>
                    <input type="text" name="kelurahan" class="input w-full" value="{{ old('kelurahan') }}">
                    @error('kelurahan')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Kecamatan <span class="text-rose-500">*</span></label>
                    <input type="text" name="kecamatan" class="input w-full" value="{{ old('kecamatan') }}">
                    @error('kecamatan')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Kota <span class="text-rose-500">*</span></label>
                    <input type="text" name="kota" class="input w-full" value="{{ old('kota') }}">
                    @error('kota')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Provinsi <span class="text-rose-500">*</span></label>
                    <input type="text" name="provinsi" class="input w-full" value="{{ old('provinsi') }}">
                    @error('provinsi')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Agama <span class="text-rose-500">*</span></label>
                    <input type="text" name="agama" class="input w-full" value="{{ old('agama') }}">
                    @error('agama')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Pekerjaan <span class="text-rose-500">*</span></label>
                    <input type="text" name="pekerjaan" class="input w-full" value="{{ old('pekerjaan') }}">
                    @error('pekerjaan')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Pendidikan <span class="text-rose-500">*</span></label>
                    <select name="pendidikan" class="input w-full">
                        <option value="">- Pilih -</option>
                        <option value="SD" @selected(old('pendidikan') == 'SD')>SD</option>
                        <option value="SMP" @selected(old('pendidikan') == 'SMP')>SMP</option>
                        <option value="SMA" @selected(old('pendidikan') == 'SMA')>SMA</option>
                        <option value="D3" @selected(old('pendidikan') == 'D3')>D3</option>
                        <option value="S1" @selected(old('pendidikan') == 'S1')>S1</option>
                        <option value="S2" @selected(old('pendidikan') == 'S2')>S2</option>
                        <option value="S3" @selected(old('pendidikan') == 'S3')>S3</option>
                    </select>
                    @error('pendidikan')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Status Warga <span class="text-rose-500">*</span></label>
                    <select name="status_warga" class="input w-full">
                        <option value="">- Pilih -</option>
                        <option value="tetap" @selected(old('status_warga') == 'tetap')>Tetap</option>
                        <option value="kontrakan" @selected(old('status_warga') == 'kontrakan')>Kontrakan</option>
                        <option value="kos" @selected(old('status_warga') == 'kos')>Kos</option>
                    </select>
                    @error('status_warga')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Status Keluarga <span class="text-rose-500">*</span></label>
                    <select name="status_keluarga" class="input w-full">
                        <option value="">- Pilih -</option>
                        <option value="kepala" @selected(old('status_keluarga') == 'kepala')>Kepala</option>
                        <option value="istri" @selected(old('status_keluarga') == 'istri')>Istri</option>
                        <option value="anak" @selected(old('status_keluarga') == 'anak')>Anak</option>
                        <option value="lainnya" @selected(old('status_keluarga') == 'lainnya')>Lainnya</option>
                    </select>
                    @error('status_keluarga')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Telepon</label>
                    <input type="tel" name="telepon" class="input w-full" value="{{ old('telepon') }}">
                    @error('telepon')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Email</label>
                    <input type="email" name="email" class="input w-full" value="{{ old('email') }}">
                    @error('email')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="aktif" value="1" class="rounded" @checked(old('aktif', true))>
                        <span>Aktif</span>
                    </label>
                    @error('aktif')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-end gap-2 pt-4 border-t border-border">
                    <a href="{{ route('rt.data-warga.index') }}" class="btn-secondary btn-sm">Batal</a>
                    <button type="submit" class="btn-primary btn-sm">Simpan</button>
                </div>
            </form>
        </x-ui.card>
    </div>
</x-layouts.rt>
