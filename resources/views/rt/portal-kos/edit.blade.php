<x-layouts.rt>
    <x-slot:title>Edit Penghuni Kos</x-slot:title>
    <x-slot:subtitle>Ubah data penghuni kos</x-slot:subtitle>

    <div class="max-w-2xl">
        <x-ui.card>
            <form action="{{ route('rt.portal-kos.update', $portalKo) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <input type="hidden" name="user_id" value="{{ old('user_id', $portalKo->user_id) }}">

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Nama <span class="text-rose-500">*</span></label>
                    <input type="text" name="nama" class="input w-full" value="{{ old('nama', $portalKo->nama) }}">
                    @error('nama')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">NIK <span class="text-rose-500">*</span></label>
                    <input type="text" name="nik" class="input w-full" value="{{ old('nik', $portalKo->nik) }}" maxlength="16">
                    @error('nik')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Telepon</label>
                    <input type="tel" name="telepon" class="input w-full" value="{{ old('telepon', $portalKo->telepon) }}">
                    @error('telepon')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Alamat Kos <span class="text-rose-500">*</span></label>
                    <input type="text" name="alamat_kos" class="input w-full" value="{{ old('alamat_kos', $portalKo->alamat_kos) }}">
                    @error('alamat_kos')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Pemilik <span class="text-rose-500">*</span></label>
                    <input type="text" name="pemilik" class="input w-full" value="{{ old('pemilik', $portalKo->pemilik) }}">
                    @error('pemilik')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Kontak Pemilik</label>
                    <input type="tel" name="kontak_pemilik" class="input w-full" value="{{ old('kontak_pemilik', $portalKo->kontak_pemilik) }}">
                    @error('kontak_pemilik')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Tanggal Masuk <span class="text-rose-500">*</span></label>
                    <input type="date" name="tanggal_masuk" class="input w-full" value="{{ old('tanggal_masuk', $portalKo->tanggal_masuk) }}">
                    @error('tanggal_masuk')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Tanggal Keluar</label>
                    <input type="date" name="tanggal_keluar" class="input w-full" value="{{ old('tanggal_keluar', $portalKo->tanggal_keluar) }}">
                    @error('tanggal_keluar')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Biaya Sewa <span class="text-rose-500">*</span></label>
                    <input type="number" name="biaya_sewa" class="input w-full" value="{{ old('biaya_sewa', $portalKo->biaya_sewa) }}" step="0.01">
                    @error('biaya_sewa')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Catatan</label>
                    <textarea name="catatan" class="input w-full" rows="4">{{ old('catatan', $portalKo->catatan) }}</textarea>
                    @error('catatan')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="aktif" value="1" class="rounded" @checked(old('aktif', $portalKo->aktif))>
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
