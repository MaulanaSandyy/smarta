<x-layouts.masjid>
    <x-slot:title>Tambah Inventaris</x-slot:title>
    <x-slot:subtitle>Catat barang inventaris masjid</x-slot:subtitle>

    <div class="max-w-2xl">
        <x-ui.card>
            <form action="{{ route('masjid.inventaris.store') }}" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Nama <span class="text-rose-500">*</span></label>
                    <input type="text" name="nama" class="input w-full" value="{{ old('nama') }}" maxlength="255" required>
                    @error('nama')<p class="text-rose-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Kategori <span class="text-rose-500">*</span></label>
                    <input type="text" name="kategori" class="input w-full" value="{{ old('kategori') }}" maxlength="255" required>
                    @error('kategori')<p class="text-rose-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Jumlah <span class="text-rose-500">*</span></label>
                    <input type="number" name="jumlah" class="input w-full" value="{{ old('jumlah') }}" step="1" min="0" required>
                    @error('jumlah')<p class="text-rose-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Kondisi <span class="text-rose-500">*</span></label>
                    <select name="kondisi" class="input w-full" required>
                        <option value="">Pilih...</option>
                        <option value="baik" @selected(old('kondisi') == 'baik')>Baik</option>
                        <option value="rusak_ringan" @selected(old('kondisi') == 'rusak_ringan')>Rusak Ringan</option>
                        <option value="rusak_berat" @selected(old('kondisi') == 'rusak_berat')>Rusak Berat</option>
                        <option value="perbaikan" @selected(old('kondisi') == 'perbaikan')>Perbaikan</option>
                    </select>
                    @error('kondisi')<p class="text-rose-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Lokasi</label>
                    <input type="text" name="lokasi" class="input w-full" value="{{ old('lokasi') }}" maxlength="255">
                    @error('lokasi')<p class="text-rose-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Nilai <span class="text-rose-500">*</span></label>
                    <input type="number" name="nilai" class="input w-full" value="{{ old('nilai') }}" step="0.01" min="0" required>
                    @error('nilai')<p class="text-rose-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Keterangan</label>
                    <textarea name="keterangan" class="input w-full" rows="4">{{ old('keterangan') }}</textarea>
                    @error('keterangan')<p class="text-rose-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Foto</label>
                    <input type="text" name="foto" class="input w-full" value="{{ old('foto') }}" maxlength="255">
                    @error('foto')<p class="text-rose-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div class="flex items-center justify-end gap-2 pt-4 border-t border-border">
                    <a href="{{ route('masjid.inventaris.index') }}" class="btn-secondary btn-sm">Batal</a>
                    <button type="submit" class="btn-primary btn-sm">Simpan</button>
                </div>
            </form>
        </x-ui.card>
    </div>
</x-layouts.masjid>
