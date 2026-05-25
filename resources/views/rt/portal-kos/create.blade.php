<x-layouts.rt>
    <x-slot:title>Tambah Penghuni Kos</x-slot:title>
    <x-slot:subtitle>Data penghuni kos/kontrakan baru</x-slot:subtitle>

    <div class="max-w-2xl">
        <x-ui.card>
            <form action="{{ route('rt.portal-kos.store') }}" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Nama <span class="text-rose-500">*</span></label>
                    <input type="text" name="nama" class="input w-full" value="{{ old('nama') }}">
                    @error('nama')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">NIK</label>
                    <input type="text" name="nik" class="input w-full" value="{{ old('nik') }}" maxlength="20">
                    @error('nik')
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
                    <label class="block text-sm font-medium text-text-primary mb-1">Alamat Kos</label>
                    <textarea name="alamat_kos" class="input w-full" rows="3">{{ old('alamat_kos') }}</textarea>
                    @error('alamat_kos')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Pemilik</label>
                    <input type="text" name="pemilik" class="input w-full" value="{{ old('pemilik') }}">
                    @error('pemilik')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Kontak Pemilik</label>
                    <input type="tel" name="kontak_pemilik" class="input w-full" value="{{ old('kontak_pemilik') }}">
                    @error('kontak_pemilik')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Tanggal Masuk</label>
                    <input type="date" name="tanggal_masuk" class="input w-full" value="{{ old('tanggal_masuk') }}">
                    @error('tanggal_masuk')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Tanggal Keluar</label>
                    <input type="date" name="tanggal_keluar" class="input w-full" value="{{ old('tanggal_keluar') }}">
                    @error('tanggal_keluar')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Biaya Sewa</label>
                    <input type="number" name="biaya_sewa" class="input w-full" value="{{ old('biaya_sewa') }}" step="0.01" min="0">
                    @error('biaya_sewa')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Catatan</label>
                    <textarea name="catatan" class="input w-full" rows="4">{{ old('catatan') }}</textarea>
                    @error('catatan')
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
                    <a href="{{ route('rt.portal-kos.index') }}" class="btn-secondary btn-sm">Batal</a>
                    <button type="submit" class="btn-primary btn-sm">Simpan</button>
                </div>
            </form>
        </x-ui.card>
    </div>
</x-layouts.rt>
