<x-layouts.rt>
    <x-slot:title>Tambah Iuran</x-slot:title>
    <x-slot:subtitle>Buat iuran baru untuk warga</x-slot:subtitle>

    <div class="max-w-2xl">
        <x-ui.card>
            <form action="{{ route('rt.iuran.store') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Nama Iuran <span class="text-rose-500">*</span></label>
                    <input type="text" name="nama" class="input w-full" value="{{ old('nama') }}">
                    @error('nama')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Jumlah <span class="text-rose-500">*</span></label>
                    <input type="number" name="jumlah" class="input w-full" value="{{ old('jumlah') }}" step="0.01" min="0">
                    @error('jumlah')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Periode <span class="text-rose-500">*</span></label>
                    <select name="periode" class="input w-full">
                        <option value="">- Pilih -</option>
                        <option value="bulanan" @selected(old('periode') == 'bulanan')>Bulanan</option>
                        <option value="tahunan" @selected(old('periode') == 'tahunan')>Tahunan</option>
                        <option value="sekali" @selected(old('periode') == 'sekali')>Sekali</option>
                    </select>
                    @error('periode')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Keterangan</label>
                    <textarea name="keterangan" class="input w-full" rows="4">{{ old('keterangan') }}</textarea>
                    @error('keterangan')
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
                    <a href="{{ route('rt.iuran.index') }}" class="btn-secondary btn-sm">Batal</a>
                    <button type="submit" class="btn-primary btn-sm">Simpan</button>
                </div>
            </form>
        </x-ui.card>
    </div>
</x-layouts.rt>
