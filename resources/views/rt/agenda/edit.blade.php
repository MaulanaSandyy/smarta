<x-layouts.rt>
    <x-slot:title>Edit Agenda</x-slot:title>
    <x-slot:subtitle>Ubah agenda kegiatan</x-slot:subtitle>

    <div class="max-w-2xl">
        <x-ui.card>
            <form action="{{ route('rt.agenda.update', $agenda) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Judul <span class="text-rose-500">*</span></label>
                    <input type="text" name="judul" class="input w-full" value="{{ old('judul', $agenda->judul) }}">
                    @error('judul')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Tanggal <span class="text-rose-500">*</span></label>
                    <input type="date" name="tanggal" class="input w-full" value="{{ old('tanggal', $agenda->tanggal) }}">
                    @error('tanggal')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Waktu <span class="text-rose-500">*</span></label>
                    <input type="time" name="waktu" class="input w-full" value="{{ old('waktu', $agenda->waktu) }}">
                    @error('waktu')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Tempat <span class="text-rose-500">*</span></label>
                    <input type="text" name="tempat" class="input w-full" value="{{ old('tempat', $agenda->tempat) }}">
                    @error('tempat')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Kategori <span class="text-rose-500">*</span></label>
                    <select name="kategori" class="input w-full">
                        <option value="">- Pilih -</option>
                        <option value="kegiatan" @selected(old('kategori', $agenda->kategori) == 'kegiatan')>Kegiatan</option>
                        <option value="rapat" @selected(old('kategori', $agenda->kategori) == 'rapat')>Rapat</option>
                        <option value="kerja_bakti" @selected(old('kategori', $agenda->kategori) == 'kerja_bakti')>Kerja Bakti</option>
                        <option value="sosial" @selected(old('kategori', $agenda->kategori) == 'sosial')>Sosial</option>
                        <option value="lainnya" @selected(old('kategori', $agenda->kategori) == 'lainnya')>Lainnya</option>
                    </select>
                    @error('kategori')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Deskripsi</label>
                    <textarea name="deskripsi" class="input w-full" rows="4">{{ old('deskripsi', $agenda->deskripsi) }}</textarea>
                    @error('deskripsi')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Status <span class="text-rose-500">*</span></label>
                    <select name="status" class="input w-full">
                        <option value="">- Pilih -</option>
                        <option value="direncanakan" @selected(old('status', $agenda->status) == 'direncanakan')>Direncanakan</option>
                        <option value="berlangsung" @selected(old('status', $agenda->status) == 'berlangsung')>Berlangsung</option>
                        <option value="selesai" @selected(old('status', $agenda->status) == 'selesai')>Selesai</option>
                        <option value="dibatalkan" @selected(old('status', $agenda->status) == 'dibatalkan')>Dibatalkan</option>
                    </select>
                    @error('status')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-end gap-2 pt-4 border-t border-border">
                    <a href="{{ route('rt.agenda.index') }}" class="btn-secondary btn-sm">Batal</a>
                    <button type="submit" class="btn-primary btn-sm">Simpan</button>
                </div>
            </form>
        </x-ui.card>
    </div>
</x-layouts.rt>
