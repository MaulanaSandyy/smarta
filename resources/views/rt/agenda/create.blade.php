<x-layouts.rt>
    <x-slot:title>Tambah Agenda</x-slot:title>
    <x-slot:subtitle>Buat agenda kegiatan baru</x-slot:subtitle>

    <div class="max-w-2xl">
        <x-ui.card>
            <form action="{{ route('rt.agenda.store') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Judul <span class="text-rose-500">*</span></label>
                    <input type="text" name="judul" class="input w-full" value="{{ old('judul') }}">
                    @error('judul')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Tanggal <span class="text-rose-500">*</span></label>
                    <input type="date" name="tanggal" class="input w-full" value="{{ old('tanggal') }}">
                    @error('tanggal')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Waktu</label>
                    <input type="time" name="waktu" class="input w-full" value="{{ old('waktu') }}">
                    @error('waktu')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Tempat</label>
                    <input type="text" name="tempat" class="input w-full" value="{{ old('tempat') }}">
                    @error('tempat')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Kategori <span class="text-rose-500">*</span></label>
                    <select name="kategori" class="input w-full">
                        <option value="">- Pilih -</option>
                        <option value="kegiatan" @selected(old('kategori') == 'kegiatan')>Kegiatan</option>
                        <option value="rapat" @selected(old('kategori') == 'rapat')>Rapat</option>
                        <option value="kerja_bakti" @selected(old('kategori') == 'kerja_bakti')>Kerja Bakti</option>
                        <option value="sosial" @selected(old('kategori') == 'sosial')>Sosial</option>
                        <option value="lainnya" @selected(old('kategori') == 'lainnya')>Lainnya</option>
                    </select>
                    @error('kategori')
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
                    <label class="block text-sm font-medium text-text-primary mb-1">Status <span class="text-rose-500">*</span></label>
                    <select name="status" class="input w-full">
                        <option value="">- Pilih -</option>
                        <option value="direncanakan" @selected(old('status') == 'direncanakan')>Direncanakan</option>
                        <option value="berlangsung" @selected(old('status') == 'berlangsung')>Berlangsung</option>
                        <option value="selesai" @selected(old('status') == 'selesai')>Selesai</option>
                        <option value="dibatalkan" @selected(old('status') == 'dibatalkan')>Dibatalkan</option>
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
