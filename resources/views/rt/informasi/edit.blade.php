<x-layouts.rt>
    <x-slot:title>Edit Informasi</x-slot:title>
    <x-slot:subtitle>Ubah informasi</x-slot:subtitle>

    <div class="max-w-2xl">
        <x-ui.card>
            <form action="{{ route('rt.informasi.update', $informasi) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <input type="hidden" name="user_id" value="{{ old('user_id', $informasi->user_id) }}">

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Judul <span class="text-rose-500">*</span></label>
                    <input type="text" name="judul" class="input w-full" value="{{ old('judul', $informasi->judul) }}">
                    @error('judul')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Isi <span class="text-rose-500">*</span></label>
                    <textarea name="isi" class="input w-full" rows="6">{{ old('isi', $informasi->isi) }}</textarea>
                    @error('isi')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Kategori <span class="text-rose-500">*</span></label>
                    <select name="kategori" class="input w-full">
                        <option value="">- Pilih -</option>
                        <option value="umum" @selected(old('kategori', $informasi->kategori) == 'umum')>Umum</option>
                        <option value="kegiatan" @selected(old('kategori', $informasi->kategori) == 'kegiatan')>Kegiatan</option>
                        <option value="pengumuman" @selected(old('kategori', $informasi->kategori) == 'pengumuman')>Pengumuman</option>
                        <option value="peringatan" @selected(old('kategori', $informasi->kategori) == 'peringatan')>Peringatan</option>
                    </select>
                    @error('kategori')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="penting" value="1" class="rounded" @checked(old('penting', $informasi->penting))>
                        <span>Penting</span>
                    </label>
                    @error('penting')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="diterbitkan" value="1" class="rounded" @checked(old('diterbitkan', $informasi->diterbitkan))>
                        <span>Diterbitkan</span>
                    </label>
                    @error('diterbitkan')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Tanggal Terbit</label>
                    <input type="date" name="tanggal_terbit" class="input w-full" value="{{ old('tanggal_terbit', $informasi->tanggal_terbit) }}">
                    @error('tanggal_terbit')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-end gap-2 pt-4 border-t border-border">
                    <a href="{{ route('rt.informasi.index') }}" class="btn-secondary btn-sm">Batal</a>
                    <button type="submit" class="btn-primary btn-sm">Simpan</button>
                </div>
            </form>
        </x-ui.card>
    </div>
</x-layouts.rt>
