<x-layouts.rt>
    <x-slot:title>Tambah Kelompok Ronda</x-slot:title>
    <x-slot:subtitle>Buat kelompok ronda baru</x-slot:subtitle>

    <div class="max-w-2xl">
        <x-ui.card>
            <form action="{{ route('rt.ronda.store') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Nama <span class="text-rose-500">*</span></label>
                    <input type="text" name="nama" class="input w-full" value="{{ old('nama') }}">
                    @error('nama')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Deskripsi</label>
                    <textarea name="deskripsi" class="input w-full" rows="4">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
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
                    <a href="{{ route('rt.ronda.index') }}" class="btn-secondary btn-sm">Batal</a>
                    <button type="submit" class="btn-primary btn-sm">Simpan</button>
                </div>
            </form>
        </x-ui.card>
    </div>
</x-layouts.rt>
